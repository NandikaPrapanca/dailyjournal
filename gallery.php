<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="bi bi-plus-lg"></i> Tambah Gambar
    </button>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Alt Text</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM gallery ORDER BY id DESC";
                    $hasil = $conn->query($sql);

                    $no = 1;
                    while ($row = $hasil->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <?php
                                if (file_exists('img/' . $row["image_path"])) {
                                ?>
                                    <img src="img/<?= $row["image_path"] ?>" width="100">
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $row["alt_text"] ?></td>
                            <td>
                                <a href="#" title="edit" class="badge rounded-pill text-bg-success" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row["id"] ?>"><i class="bi bi-pencil"></i></a>
                                <a href="#" title="delete" class="badge rounded-pill text-bg-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row["id"] ?>"><i class="bi bi-x-circle"></i></a>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="modalEdit<?= $row["id"] ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Gambar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                    <div class="mb-3">
                                                        <label for="alt_text" class="form-label">Alt Text</label>
                                                        <input type="text" class="form-control" name="alt_text" value="<?= $row["alt_text"] ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="image" class="form-label">Ganti Gambar</label>
                                                        <input type="file" class="form-control" name="image">
                                                    </div>
                                                    <input type="hidden" name="old_image" value="<?= $row["image_path"] ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" name="update" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="modalHapus<?= $row["id"] ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Gambar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form method="post">
                                                <div class="modal-body">
                                                    <p>Yakin ingin menghapus gambar ini?</p>
                                                    <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                    <input type="hidden" name="image" value="<?= $row["image_path"] ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Modal Tambah -->
        <div class="modal fade" id="modalTambah" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Gambar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="alt_text" class="form-label">Alt Text</label>
                                <input type="text" class="form-control" name="alt_text" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" class="form-control" name="image" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="add" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "upload_foto.php";

if (isset($_POST['add'])) {
    // Tambah gambar
    $alt_text = $_POST['alt_text'];
    $image_name = upload_foto($_FILES['image'])['message'];
    $stmt = $conn->prepare("INSERT INTO gallery (image_path, alt_text) VALUES (?, ?)");
    $stmt->bind_param("ss", $image_name, $alt_text);
    $stmt->execute();
}

if (isset($_POST['update'])) {
    // Update gambar
    $id = $_POST['id'];
    $alt_text = $_POST['alt_text'];
    $image_name = $_FILES['image']['name'] ? upload_foto($_FILES['image'])['message'] : $_POST['old_image'];
    $stmt = $conn->prepare("UPDATE gallery SET image_path = ?, alt_text = ? WHERE id = ?");
    $stmt->bind_param("ssi", $image_name, $alt_text, $id);
    $stmt->execute();
}

if (isset($_POST['delete'])) {
    // Hapus gambar
    $id = $_POST['id'];
    unlink("img/" . $_POST['image']);
    $stmt = $conn->prepare("DELETE FROM gallery WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
?>

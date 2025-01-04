<?php
// Memulai session atau melanjutkan session yang sudah ada
session_start();

// Menyertakan file koneksi database
include "koneksi.php";

//check jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])) { 
	header("location:admin.php"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['user'];
  $password = md5($_POST['pass']);

  // Prepared statement untuk keamanan query
  $stmt = $conn->prepare("SELECT username FROM user WHERE username=? AND password=?");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $hasil = $stmt->get_result();
  $row = $hasil->fetch_array(MYSQLI_ASSOC);

  if (!empty($row)) {
    $_SESSION['username'] = $row['username'];
    header("location:admin.php");
  } else {
    header("location:login.php");
  }

  $stmt->close();
  $conn->close();
} else {
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman Login</title>

    <!-- Mengimpor Bootstrap dari CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Welcome To UDINUS Journal</h4>
                </div>
                <div class="card-body">
                    <!-- Form Login -->
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label for="user">Username</label>
                            <input type="text" class="form-control" id="user" name="user" placeholder="Masukkan Username" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Masukkan Password" required>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
                    </form>

                    <!-- Informasi Error -->
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            Username atau password salah!
                        </div>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mengimpor JS Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

</body>
</html>

<?php
}
?>

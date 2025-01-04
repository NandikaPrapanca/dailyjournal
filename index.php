<?php
include "koneksi.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Daily Journal</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <style>
    /* Navbar Enhancements */
.navbar {
    padding: 10px 20px;
    transition: background-color 0.4s ease, box-shadow 0.3s ease;
}

/* Smooth shadow effect on navbar */
.navbar:hover {
    background-color: #002a4e;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
}

/* Button hover effects */
.btn.btn-outline-light {
    transition: transform 0.2s ease-in-out, background-color 0.3s;
}

.btn-outline-light:hover {
    transform: scale(1.05);
    background-color: #00509e;
}

/* Search button with icon */
.btn-outline-success {
    transition: background-color 0.3s ease;
}

.btn-outline-success:hover {
    background-color: #218838;
}

/* Rounded Navbar Logo */
.rounded-3 {
    transition: transform 0.3s;
}

.rounded-3:hover {
    transform: scale(1.1);
}

/* Adjust search input */
.form-control[type="search"] {
    background-color: #f8f9fa;
    color: #000;
    transition: background-color 0.5s ease;
}

/* Add subtle transition effects */
.nav-link:hover {
    text-decoration: none;
    color: #ffeb3d;
    transition: color 0.3s ease-in-out;
}

    :root {
    --background-color: #ffffff;
    --text-color: #000000;
    --btn-background: #003366;
    --btn-hover-background: #00509e;
    --card-background: #f8f9fa;
    --shadow-hover-color: rgba(0, 0, 0, 0.1);
    --input-background: #f8f9fa;
    }

    body {
        background-color: var(--background-color);
        color: var(--text-color);
        transition: background-color 0.5s, color 0.5s;
    }

    .dark-mode {
        --background-color: #121212;
        --text-color: #ffffff;
        --btn-background: #333333;
        --btn-hover-background: #555555;
        --card-background: #222222;
        --shadow-hover-color: rgba(255, 255, 255, 0.1);
        --input-background: #1e1e1e;
    }

    .form-control[type="search"] {
        background-color: var(--input-background);
        color: var(--text-color);
    }

    /* Button Styles */
    .btn {
        background-color: var(--btn-background);
        color: #fff;
        font-weight: bold;
        border: none;
        transition: background-color 0.3s, transform 0.2s;
        text-align: center;
    }

    .btn:hover {
        background-color: var(--btn-hover-background) !important;
        color: #fff !important; /* Ensure text color remains visible */
        transform: scale(1.05);
        text-decoration: none;
    }

    /* Sign Out Button */
    .btn-outline-light {
        border-color: #fff !important;
        color: #fff !important;
        background-color: transparent;
        transition: background-color 0.3s;
    }

    .btn-outline-light:hover {
        background-color: #00509e !important;
        color: #fff !important;
    }

    /* Search Button */
    .btn-outline-success {
        background-color: #0033A0 !important; /* UDINUS Blue */
        color: #fff !important;
        font-weight: bold;
        padding: 10px 20px;
        border: none;
        transition: background-color 0.3s ease;
        border-radius: 25px;
    }

    .btn-outline-success:hover {
        background-color: #002e80 !important; /* Slightly darker blue for hover effect */
        color: #fff !important;
    }


    .card {
        background-color: var(--card-background);
        color: var(--text-color);
        transition: background-color 0.3s;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px var(--shadow-hover-color);
    }

    /* Smooth icon transitions */
    .toggle-dark-mode i {
        transition: transform 0.3s;
    }

    .toggle-dark-mode:hover i {
        transform: rotate(360deg);
    }
    .shadow-hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .carousel-inner img {
        border-radius: 10px;
    }
    .back-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    display: none;
    z-index: 99;
    }
    .toggle-dark-mode {
            position: fixed;
            bottom: 80px;
            right: 20px;
            z-index: 99;
    }
    .dark-mode {
    background-color: #121212; /* Dark background */
    color: #ffffff; /* Light text */
    }
    .dark-mode .btn {
        background-color: #333333; /* Dark buttons */
        color: #ffffff;
    }
    .dark-mode .card {
        background-color: #222222;
        color: #ffffff;
    }
    .dark-mode #gallery {
    background-color: #1a1a1a; /* Dark mode for gallery */
    }
    .dark-mode #hero {
        background-color: #1a1a1a; /* Dark mode for hero section */
        color: #ffffff;
    }
    /* In Dark Mode - Follow Us icons */
    .dark-mode .text-dark i {
        color: #ffffff !important;
    }


  .form-control[type="search"] {
      background-color: #f8f9fa !important; /* Light gray or default input background */
      color: #000; /* Text color inside input */
  }

  .form-inline .btn {
      background-color: #003366 !important; /* UDINUS blue */
      color: #fff !important;
      font-weight: bold;
      border: none;
      padding: 10px 20px;
      border-radius: 25px;
      transition: background-color 0.3s, transform 0.2s;
  }

  .form-inline .btn:hover {
      background-color: #00509e !important;
      transform: scale(1.05);
  }
    /* Dark Mode Toggle Button */
  #toggle-dark-mode {
      background: linear-gradient(90deg, #00509e, #5a4ee5);
      color: #fff;
      font-weight: bold;
      font-size: 18px;
      padding: 10px 20px;
      border: none;
      border-radius: 50px;
      transition: background 0.4s ease, transform 0.2s ease, box-shadow 0.3s ease;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      text-transform: uppercase;
      outline: none;
      cursor: pointer;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
  }

  /* Button Hover Effect */
  #toggle-dark-mode:hover {
      background: linear-gradient(90deg, #003366, #5a4ee5);
      transform: scale(1.05);
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
  }

  /* Button Active Effect */
  #toggle-dark-mode:active {
      transform: scale(0.95);
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
  }

  /* Icon Animation */
  #toggle-icon {
      transition: transform 0.3s ease;
  }

  #toggle-dark-mode:hover #toggle-icon {
      transform: rotate(360deg);
  }

  

</style>    
</head>

<body>
    <!-- Header -->
<header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top shadow-sm" style="background-color: #003366; transition: background-color 0.3s, box-shadow 0.3s;">
      <div class="container d-flex align-items-center justify-content-between">
          
          <!-- Logo -->
          <img src="img/logo-new.png" alt="Logo" width="125px" class="rounded-3">

          <!-- Toggler Button -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Navbar Links -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link btn btn-outline-light mx-2 px-3 py-2 rounded-pill text-white" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link btn btn-outline-light mx-2 px-3 py-2 rounded-pill text-white" href="#article">Article</a>
                  </li>
                  <li class="nav-item">
                      <a class="btn btn-outline-light mx-2 px-3 py-2 rounded-pill text-white" href="#gallery">Gallery</a>
                  </li>
                  <li class="nav-item">
                      <a class="btn btn-outline-light mx-2 px-3 py-2 rounded-pill" href="logout.php">Login</a>
                  </li>
              </ul>

              <!-- Search Form -->
              <form class="d-flex mt-2 mt-lg-0 align-items-center">
                  <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success rounded-pill" type="submit">
                      <i class="bi bi-search"></i>
                  </button>
              </form>
          </div>
      </div>
  </nav>
</header>

    <!--section-->

    <!--Gallery-->
    <?php
    $sql = "SELECT image_path, alt_text FROM gallery";
    $hasil = $conn->query($sql);
    ?>
    <section id="gallery" class="text-center p-5 bg-danger-subtle">
    <h1 class="fw-bold display-8 pb-3">GALLERY</h1>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            if ($hasil->num_rows > 0) {
                $isActive = true; // Menandai item pertama sebagai aktif
                while ($row = $hasil->fetch_assoc()) {
                    ?>
                    <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
                        <img src="<?= $row['image_path'] ?>" class="d-block w-100" alt="<?= $row['alt_text'] ?>">
                    </div>
                    <?php
                    $isActive = false;
                }
            } else {
                echo "<div class='carousel-item active'><p>No images found.</p></div>";
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

    <!--Hero-->
    <section id="hero" class=" text-sm-start text-center p-5">
        <div class="container">
            <div class="d-sm-flex flex-sm-row-reverse align-items-center">
                <img src="img/foto11.jpg" alt="" class="img-fluid" width="300">
                <div>
                    <h1 class="fw-bold display-4" style="color: #003366;">UDINUS Semarang, unggul dan inovatif di bidang teknologi dan bisnis.</h1>
                    <h4 class="lead display-6">Terletak di jantung kota Semarang, UDINUS menawarkan lingkungan belajar modern dan fasilitas lengkap bagi para mahasiswanya.</h4>
                </div>
            </div>
        </div>
    </section>

    <!--Article-->
    <!-- article begin -->
<section id="article" class="text-center p-5">
  <div class="container">
    <h1 class="fw-bold display-4 pb-3">article</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
    </div>
  </div>
</section>
<!-- article end -->
      <!--Icons-->
  <section class="text-center my-4">
    <h2 class="fw-bold pb-3">Follow Us</h2>
    <div class="d-flex justify-content-center gap-4">
        <a href="https://www.facebook.com/@univ.dian.nuswantoro" class="text-dark"><i class="bi bi-facebook fs-3"></i></a>
        <a href="https://x.com/udinusofficial?lang=en" class="text-dark"><i class="bi bi-twitter fs-3"></i></a>
        <a href="https://www.instagram.com/udinusofficial?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="text-dark"><i class="bi bi-instagram fs-3"></i></a>
        <a href="https://www.youtube.com/@tvku_udinus" class="text-dark"><i class="bi bi-youtube fs-3"></i></a>
    </div>
</section>

      <!--Dark Mode Toggle-->
      <button onclick="toggleDarkMode()" id="toggle-dark-mode" class="btn btn-secondary toggle-dark-mode">
        <i id="toggle-icon" class="bi bi-moon-fill"></i> Dark Mode
    </button>
    
    
    <!--footer-->
    <footer class="p-5 text-white" style="background-color: #003366;">
      <p class="fs-3">Contact</p>
      <i class="bi bi-whatsapp fs-5"> (024) 3517261</i><br>
      <i class="bi bi-house fs-5">  Jl. Imam Bonjol No.207, Pendrikan Kidul, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50131</i><br>
      <i class="bi bi-image fs-5">  Website</i>
      <hr>
      <p class="text-center fs-7" style="font-family: 'Times New Roman', Times, serif;">Nandika Rizki Prapanca</p>
        <p class="text-center">&copy; Copyright 2024</p>
    </footer>

    <!--Back to top button-->
    <button onclick="topFunction()" class="btn btn-primary back-to-top">
      <i class="bi bi-arrow-up"></i>
    </button>
    <script>
      // Show/hide Tombol "back to top"
      window.onscroll = function() {scrollFunction()};
      
      function scrollFunction() {
          let button = document.querySelector('.back-to-top');
          if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
              button.style.display = "block";
          } else {
              button.style.display = "none";
          }
      }
      // Scroll Ke Atas Saat Tombol Ditekan
      function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
      }
       // Dark mode toggle
       function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }
  </script>
  
</body>
</html>
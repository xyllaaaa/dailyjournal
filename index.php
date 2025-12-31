<?php
include "koneksi.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Silla Daily's Journal</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <style>
    /* THEME MODE */
    body.dark-mode {
      background-color: #121212;
      color: white;
    }
    .dark-mode .navbar,
    .dark-mode footer {
      background-color: #1f1f1f !important;
    }
    .dark-mode .card {
      background-color: #2a2a2a;
      color: white;
    }

    /* CUSTOM STYLE */
    .theme-btn {
      border: none;
      padding: 8px 12px;
      border-radius: 8px;
      margin-left: 6px;
      cursor: pointer;
    }
    .btn-dark-mode {
      background-color: #212529;
      color: white;
    }
    .btn-light-mode {
      background-color: #dc3545;
      color: white;
    }
    .profile-img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid #dc3545;
    }
  </style>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">Silla Daily's Journal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
              aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
          <li class="nav-item"><a class="nav-link" href="#HOME">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#ARTICLE">Article</a></li>
          <li class="nav-item"><a class="nav-link" href="#GALLERY">Gallery</a></li>
          <li class="nav-item"><a class="nav-link" href="#SCHEDULE">Schedule</a></li>
          <li class="nav-item"><a class="nav-link" href="#PROFILE">Profile</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php" target="_blank">Login</a></li>
        </ul>

        <!-- THEME SWITCHER -->
        <div class="d-flex ms-3">
          <button id="darkBtn" class="theme-btn btn-dark-mode">
            <i class="bi bi-moon-fill"></i>
          </button>
          <button id="lightBtn" class="theme-btn btn-light-mode">
            <i class="bi bi-brightness-high-fill"></i>
          </button>
        </div>
      </div>
    </div>
  </nav>

  <!-- HERO -->
  <section id="HOME" class="text-center p-5 bg-danger-subtle text-sm-start">
    <div class="container">
      <div class="d-sm-flex flex-sm-row-reverse align-items-center">
        <img src="img/img1.jpg" class="img-fluid" width="300">
        <div>
          <h1 class="fw-bold display-5">Create Memories, Save Memories, Everyday</h1>
          <h4 class="lead">Mencatat semua kegiatan sehari-hari yang ada tanpa terkecuali</h4>
        </div>
      </div>
    </div>
  </section>

  <!-- ARTICLE -->
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
  <!-- GALLERY -->
  <section id="GALLERY" class="text-center p-5 bg-danger-subtle">
    <div class="container">
      <h1 class="fw-bold display-6 pb-3">Gallery</h1>
      <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active"><img src="img/a1.jpg" class="d-block w-100" alt="..."></div>
          <div class="carousel-item"><img src="img/a2.jpg" class="d-block w-100" alt="..."></div>
          <div class="carousel-item"><img src="img/a3.jpg" class="d-block w-100" alt="..."></div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
      </div>
    </div>
  </section>

  <!-- SCHEDULE -->
<section id="SCHEDULE" class="text-center p-5 bg-light">
  <div class="container">
    <h1 class="fw-bold mb-4 text-uppercase">My Schedule</h1>
    
    <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
      <!-- Senin -->
      <div class="col">
        <div class="card border-0 shadow-sm" style="background-color:pink; color:black;">
          <div class="card-body">
            <h5 class="fw-bold"><b>Senin</b></h5>
            <hr class="border-white opacity-75">
            <p class="mb-0"><b>08:40 - 10:20  Basis Data (R.D2K)</b></p>
            <p class="mb-0"><b>12.30 - 15.00  Logika Informatika (R.H42)</b></p>
          </div>
        </div>
      </div>

      <!-- Selasa -->
      <div class="col">
        <div class="card border-0 shadow-sm" style="background-color:pink; color:black;">
          <div class="card-body">
            <h5 class="fw-bold"><b>Selasa</b></h5>
            <hr class="border-white opacity-75">
            <p class="mb-0"><b>07.00 - 09.30  Rekayasa Perangkat Lunak (R.H35)</b></p>
            <p class="mb-0"><b>12.30 - 15.00  Sistem Operasi (R.H45)</b></p>
            <p class="mb-0"><b>16.20 - 18.00  Basis Data (R.H55)</b></p>
          </div>
        </div>
      </div>

      <!-- Rabu -->
      <div class="col">
        <div class="card border-0 shadow-sm" style="background-color:pink; color:black;">
          <div class="card-body">
            <h5 class="fw-bold"><b>Rabu</b></h5>
            <hr class="border-white opacity-75">
            <p class="mb-0"><b>10.20 - 12.00  Pemrograman Berbasis Web (R.D2J)</b></p>
            <p class="mb-0"><b>16.30 - 18.00  Sistem Informasi (R.H48)</b></p>
          </div>
        </div>
      </div>

      <!-- Kamis -->
      <div class="col">
        <div class="card border-0 shadow-sm" style="background-color:pink; color:black;">
          <div class="card-body">
            <h5 class="fw-bold">Kamis</h5>
            <hr class="border-dark opacity-75">
            <p class="mb-0"><b>07.00 - 09.30  Probabilitas dan Statistika (R.H49)</b></p>
            <p class="mb-0"><b>16.30 - 18.00  Manajemen Proyek Teknologi Informatika (R.H42)</b></p>
          </div>
        </div>
      </div>
</section>

  <!-- PROFILE -->
  <section id="PROFILE" class="text-center p-5 bg-danger-subtle">
    <div class="container">
      <h1 class="fw-bold mb-4">Profil Mahasiswa</h1>
      <div class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-4">
        <img src="img/profile.jpg" alt="Foto Profil" class="profile-img">
        <div class="card shadow p-3">
          <div class="card-body text-start">
            <h4 class="fw-bold">Meysilla Cindy Silsiana</h4>
            <p class="mb-1"><strong>NIM:</strong>A11.2024.15824 </p>
            <p class="mb-1"><strong>Program Studi:</strong> Teknik Informatika</p>
            <p class="mb-1"><strong>Email:</strong> 111202415824@mhs.Dinus.ac.id</p>
            <p class="mb-1"><strong>Telepon:</strong> +62 812-3456-7890</p>
            <p><strong>Alamat:</strong> Jatisari Permai,Kota Semarang</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="text-center p-4 bg-body-tertiary">
    <div class="container">
      <h5 class="fw-bold mb-3">My Profile</h5>
      <div class="d-flex justify-content-center gap-4">
        <a href="https://instagram.com" target="_blank" class="text-dark fs-3"><i class="bi bi-instagram"></i></a>
        <a href="https://twitter.com" target="_blank" class="text-dark fs-3"><i class="bi bi-twitter"></i></a>
        <a href="https://wa.me/6281234567890" target="_blank" class="text-dark fs-3"><i class="bi bi-whatsapp"></i></a>
      </div>
      <p class="mt-3 text-secondary">&copy; 2025 Silla Daily's Journal. All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- THEME SWITCHER -->
  <script>
    const darkBtn = document.getElementById('darkBtn');
    const lightBtn = document.getElementById('lightBtn');
    const body = document.body;

    darkBtn.addEventListener('click', () => {
      body.classList.add('dark-mode');
    });
    lightBtn.addEventListener('click', () => {
      body.classList.remove('dark-mode');
    });
  </script>
</body>
</html>

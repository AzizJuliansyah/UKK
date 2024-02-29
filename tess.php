<?php
include("header.php");
include("koneksi/koneksi.php");
?>
<style>
    /* CSS untuk menetapkan gambar sebagai background */
    body {
      background-image: url('img/bg2.webp');
      background-size: cover;
      background-position: center;
      height: 100vh; /* Mengisi tinggi seluruh viewport */
    }
    /* CSS untuk menetapkan gaya teks */
    .text-white {
      color: #fff;
    }
  </style>
<nav style="background-color: #4863A0;" class="navbar navbar-expand-sm navbar-secondary fixed-top">
        <div class="container-fluid">
            <a href="#" class="navbar-brand text-light">Waroenk</a>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php" class=" btn btn-outline-light mx-2 shadow">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="pilih-menu.php" class="nav-link text-light">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="pesan-menu.php" class="nav-link text-light">Pesan</a>
                    </li>
                </ul>
            </div>
            <a href="petugas/login.php" class="float-end btn btn-outline-light mx-2 shadow">Login</a>
        </div>
    </nav>

<body>
    <div class="main-content">
        <div class="container">
            <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h1 class="mt-5 text-white">Selamat Datang di Website Kasir</h1>
                <p class="lead text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <a href="pilih-menu.php" style="background-color: #4863A0;" class="btn text-light">Mulai</a>
            </div>
            </div>
        </div>
  </div>
</body>
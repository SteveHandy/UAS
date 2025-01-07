<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id" data-bs-theme="light">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Evognito - Memberdayakan Pendidikan dengan IoT</title>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <!-- Bootstrap Icons CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    body {
      padding-top: 70px;
      /* Mengatur jarak untuk navbar tetap */
    }

    #aboutme {
      background-color: turquoise;
    }

    #gallery {
      background-color: turquoise;
    }

    /* Background colors for light and dark modes */
    #blogs {
      background-color: #f5f5f5;
      /* Light mode */
      color: #333;
      /* Light mode text */
      padding: 2rem;
      border-radius: 8px;
    }

    /* Dark mode */
    [data-bs-theme="dark"] #blogs {
      background-color: #333;
      /* Dark mode background */
      color: #f0f0f0;
      /* Dark mode text */
    }

    /* Card styling for dark mode */
    [data-bs-theme="dark"] .card {
      background-color: #444;
      color: #f0f0f0;
      border: none;
    }

    [data-bs-theme="dark"] #aboutme {
      background-color: #333;
      /* Dark mode background */
      color: #f0f0f0;
      /* Dark mode text */
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg fixed-top bg-danger text-white">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Evognito Team</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarTogglerDemo02"
          aria-controls="navbarTogglerDemo02"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about-us">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services">Layanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#articles">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#gallery">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#schedule">Schedule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#aboutme">About Me</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <li class="nav-item">
              <button id="light-mode" class="btn btn-light">
                <i class="fas fa-sun"></i>
              </button>
            </li>
            <li class="nav-item">
              <button id="dark-mode" class="btn btn-dark">
                <i class="fas fa-moon"></i>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="container-fluid mt-2">
    <div class="d-flex justify-content-end">
      <h6>
        Time :
        <span id="tanggal"></span>
        <span id="jam"></span>
      </h6>
    </div>

    <section class="my-5 text-center" id="about-us">
      <h2>Tentang Evognito</h2>
      <p>
        Evognito adalah singkatan dari <strong>Evolution Cognitif</strong>.
        Misi kami adalah menjembatani kesenjangan antara teknologi dan
        pendidikan melalui solusi IoT yang inovatif. Kami berkomitmen untuk
        memberdayakan sekolah dan lembaga pendidikan dengan alat cerdas yang
        meningkatkan pengalaman belajar dan efisiensi operasional.
      </p>
      <p>
        Dengan fondasi teknologi IoT, solusi kami menyediakan wawasan data
        real-time dan otomatisasi untuk presensi, manajemen pembelajaran, dan
        banyak lagi. Ini menciptakan ekosistem yang mendekatkan guru, siswa,
        dan pengelola dengan pendidikan berbasis teknologi yang lebih mudah
        dan efektif.
      </p>
    </section>

    <section class="my-5" id="services">
      <h2 class="text-center">Layanan Kami</h2>
      <ul>
        <li>
          <strong>Sistem Presensi Pintar:</strong> Menggunakan perangkat RFID
          dan IoT, Evognito menawarkan sistem presensi yang anti-manipulasi
          dan melacak kehadiran siswa secara real-time. Kartu ID siswa
          berfungsi sebagai alat multifungsi untuk presensi dan akses
          perpustakaan.
        </li>
        <li>
          <strong>Platform E-Learning Kustom:</strong> Kami menyediakan sistem
          e-learning berbasis Laravel, mirip dengan Moodle, yang disesuaikan
          untuk lembaga pendidikan. Platform ini memberikan akses berbasis
          peran untuk admin, guru, dan siswa, menciptakan lingkungan kelas
          digital yang komprehensif.
        </li>
        <li>
          <strong>Data dan Analitik Real-Time:</strong> Sistem IoT kami
          terintegrasi dengan dashboard manajemen sekolah, menyediakan
          analitik real-time tentang kehadiran, dan pemantauan lingkungan yang
          membantu pengelola sekolah membuat keputusan berbasis data.
        </li>
      </ul>
    </section>

    <!-- article begin -->
    <section id="articles" class="text-center p-5">
      <div class="container">
        <h1 class="mb-4">Blog</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
          <?php
          $sql = "SELECT * FROM article ORDER BY tanggal DESC";
          $hasil = $conn->query($sql);

          $no = 1;
          while ($row = $hasil->fetch_assoc()) {
          ?>
            <div class="col">
              <div class="card h-100">
                <img src="img/<?= $row["gambar"] ?>" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title"><?= $row["judul"] ?></h5>
                  <p class="card-text">
                    <?= $row["isi"] ?>
                  </p>
                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">
                    <?= $row["tanggal"] ?>
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

    <!-- gallery begin -->
    <section id="gallery" class="text-center p-5">
      <div class="container">
        <h1 class="mb-4">Gallery</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
          <?php
          $sql = "SELECT * FROM gallery ORDER BY tanggal DESC";
          $hasil = $conn->query($sql);

          while ($row = $hasil->fetch_assoc()) {
          ?>
            <div class="col">
              <img src="img/<?= $row["gambar"] ?>" class="img-fluid" alt="<?= $row["gambar"] ?>">
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </section>

    <!-- gallery end -->

    <section class="my-5 text-center" id="schedule">
      <h2 class="mb-4">Our Schedule</h2>
      <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 g-4">
        <div class="col">
          <div class="card h-100">
            <div class="card-header text-center bg-danger text-white">
              <p>SENIN</p>
            </div>
            <div class="card-body">
              <p class="card-text">
                Logika Informatika <br>
                09.30 - 12.00 | H.4.11
              </p>
              <hr>
              <p class="card-text">
                Sistem Operasi <br>
                12.30 - 15.00 | H.4.9
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <div class="card-header text-center bg-danger text-white">
              <p>SELASA</p>
            </div>
            <div class="card-body">
              <p class="card-text">
                Basis Data <br>
                07.00 - 08.40 | H.4.1
              </p>
              <hr>
              <p class="card-text">
                Pemrograman Berbasis Web <br>
                09.30 - 12.00 | D.2.J
              </p>
              <hr>
              <p class="card-text">
                Pendidikan Kewarganegaraan <br>
                14.10 - 15.50 | Aula H.7
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <div class="card-header text-center bg-danger text-white">
              <p>RABU</p>
            </div>
            <div class="card-body">
              <p class="card-text">
                Basis Data <br>
                07.00 - 08.40 | D.3.M
              </p>
              <hr>
              <p class="card-text">
                Rekayasa Perangkat Lunak <br>
                12.30 - 15.00 | H.4.4
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <div class="card-header text-center bg-danger text-white">
              <p>KAMIS</p>
            </div>
            <div class="card-body">
              <p class="card-text">
                Probabilitas dan Statistik <br>
                09.30 - 12.00 | H.4.12
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <div class="card-header text-center bg-danger text-white">
              <p>JUMAT</p>
            </div>
            <div class="card-body">
              <p class="card-text">
                FREE
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100">
            <div class="card-header text-center bg-danger text-white">
              <p>SABTU</p>
            </div>
            <div class="card-body">
              <p class="card-text">
                FREE
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="container-fluid d-flex align-items-center justify-content-center" style="padding: 8rem 0" id="aboutme">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-4 text-center mb-4 mb-md-0">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOuxrvcNMfGLh73uKP1QqYpKoCB0JLXiBMvA&s" alt="About Me" class="img-fluid rounded-circle about-img" width="400" height="400" style="object-fit: cover;">
        </div>

        <div class="col-md-8 text-center text-md-start">
          <p class="mb-1">A11.2023.14945</p>
          <h2><b>Steve Imanuel Christ Handy</b></h2>
          <p>Program Studi Teknik Informatika<br><span onclick="window.open('https://dinus.ac.id/', '_blank')" style="cursor:pointer"><b>Universitas Dian Nuswantoro</b></span></p>
        </div>
      </div>
    </section>


  </main>

  <footer class="text-center py-3">
    <div class="social-icons">
      <i class="bi bi-instagram mx-1 fs-3"></i>
      <i class="bi bi-twitter mx-1 fs-3"></i>
      <i class="bi bi-whatsapp mx-1 fs-3"></i>

    </div>
    <p class="mt-2">Steve Imanuel Christ Handy &copy; <?= date('Y') ?></p>
  </footer>


  <script>
    document
      .getElementById("light-mode")
      .addEventListener("click", function() {
        document.documentElement.setAttribute("data-bs-theme", "light");
      });

    document
      .getElementById("dark-mode")
      .addEventListener("click", function() {
        document.documentElement.setAttribute("data-bs-theme", "dark");
      });

    window.setTimeout("tampilWaktu()", 1000);

    function tampilWaktu() {
      var waktu = new Date();
      var bulan = waktu.getMonth() + 1;

      setTimeout("tampilWaktu()", 1000);
      document.getElementById("tanggal").innerHTML =
        waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
      document.getElementById("jam").innerHTML =
        waktu.getHours() +
        ":" +
        waktu.getMinutes() +
        ":" +
        waktu.getSeconds();
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
  <!-- <script src="assets/js/theme.js"></script> -->
</body>

</html>
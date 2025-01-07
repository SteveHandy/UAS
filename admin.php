<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        body {
            padding-top: 70px;
            /* Mengatur jarak untuk navbar tetap */
        }
    </style>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top bg-danger text-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="./">Evognito Team</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mx-5">
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="./">HomePage</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php?page=dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php?page=article">Article</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php?page=gallery">Gallery</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-black fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['username'] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="admin.php?page=profile">Profile <?= $_SESSION['username'] ?></a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container-fluid mt-2">
        <!-- content begin -->
        <section id="content" class="p-5">
            <div class="container">

                <?php

                include "koneksi.php";
                if (isset($_GET['page'])) {
                ?>
                    <h4 class="lead display-6 pb-2 border-bottom border-danger-subtle"><?= ucfirst($_GET['page']) ?></h4>
                <?php
                    include($_GET['page'] . ".php");
                } else {
                ?>
                    <?= $_SESSION['username'] ?>
                    <h4 class="lead display-6 pb-2 border-bottom border-danger-subtle">Dashboard</h4>
                <?php
                    include("dashboard.php");
                }
                ?>
            </div>
        </section>
        <!-- content end -->
    </main>
    <footer class="text-center py-3">
        <div class="social-icons">
            <i class="bi bi-instagram mx-1 fs-3"></i>
            <i class="bi bi-twitter mx-1 fs-3"></i>
            <i class="bi bi-whatsapp mx-1 fs-3"></i>

        </div>
        <p class="mt-2">Steve Imanuel Christ Handy &copy; 2024-<?= date('Y') ?></p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
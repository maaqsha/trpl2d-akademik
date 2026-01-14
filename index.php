<?php
require_once 'koneksi.php';

// session | cookies
session_start();

//cek login sudah ada atau belum
if (!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container">
            <a class="navbar-brand" href="#">Akademik</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=mahasiswa">Mahasiswa</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=prodi">Prodi</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <?php
        $page = isset($_GET["page"]) ? $_GET["page"] : "home";

        if ($page == "mahasiswa") {

            include("mahasiswa/list.php");
        }
        if ($page == "home") {
            include("home.php");
        }

        if ($page == "create") {
            include("mahasiswa/create.php");
        }

        if ($page == "edit") {
            include("mahasiswa/edit.php");
        }

        if ($page == "prodi") {
            include("prodi/listp.php");
        }

        if ($page == "prodi-create") {
            include("prodi/createp.php");
        }

        if ($page == "prodi-edit") {
            include("prodi/editp.php");
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
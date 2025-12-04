<?php
require_once 'koneksi.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    include("koneksi.php");
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
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <?php
        $page = isset($_GET["page"]) ? $_GET["page"] : "home";

        if ($page == "mahasiswa") {

            include("list.php");
        }
        if ($page == "home") {
            include("home.php");
        }

        if ($page == "create") {
            include("create.php");
        }

        if ($page == "edit") {
            include("edit.php");
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
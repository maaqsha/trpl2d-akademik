<?php
require_once 'koneksi.php';
if (!isset($_GET['nim'])) {
    header('Location: index.php');
    exit;
}
$nim = mysqli_real_escape_string($koneksi, $_GET['nim']);
// perform delete
$del = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim = '$nim'");
header('Location: index.php');
exit;

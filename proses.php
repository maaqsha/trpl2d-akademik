<?php
include("koneksi.php");

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mhs'];
    $tgl = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $sql = mysqli_query($db, "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat)
    VALUES ('$nim', '$nama', '$tgl', '$alamat')");

    if ($sql) {
        echo "Data berhasil disimpan<br>";
        echo "<a href='index.php'>Tampilkan list mahasiswa</a>";
    } else {
        echo "Proses input mahasiswa gagal..";
    }
}

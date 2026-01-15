<?php
session_start();
include("../includes/koneksi.php");

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mhs'];
    $tgl = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    $sql = mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat)
    VALUES ('$nim', '$nama', '$tgl', '$alamat')");

    if ($sql) {
        echo "Data berhasil disimpan<br>";
        echo "<a href='../index.php'>Tampilkan list mahasiswa</a>";
    } else {
        echo "Proses input mahasiswa gagal..";
    }
}

if (isset($_GET['aksi']) && $_GET['aksi'] == 'insertp') {
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];

    $sql = mysqli_query($koneksi, "INSERT INTO prodi (nama_prodi, jenjang)
    VALUES ('$nama_prodi', '$jenjang')");

    if ($sql) {
        header('location: ../index.php?page=prodi');
    } else {
        echo "Proses input prodi gagal..";
    }
}

if (isset($_POST['submitp'])) {
    $id = $_POST['id'];
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang = $_POST['jenjang'];
    $keterangan = $_POST['keterangan'];

    $sql = mysqli_query($koneksi, "UPDATE prodi SET nama_prodi='$nama_prodi', jenjang='$jenjang', keterangan='$keterangan' WHERE id='$id'");

    if ($sql) {
        header('location: ../index.php?page=prodi');
    } else {
        echo "Proses update prodi gagal..";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = mysqli_query($koneksi, "DELETE FROM prodi WHERE id='$id'");
    if ($sql) {
        header('location: ../index.php?page=prodi');
    } else {
        echo "Proses delete prodi gagal..";
    }
}
if (isset($_POST['update_profile'])) {
    $nama = trim($_POST['nama']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_SESSION['email'];

    // Validate nama
    if (empty($nama)) {
        echo "Nama tidak boleh kosong.";
        exit;
    }

    // Check password
    if (!empty($password)) {
        if (strlen($password) < 6) {
            echo "Password minimal 6 karakter.";
            exit;
        }
        if ($password !== $confirm_password) {
            echo "Password konfirmasi tidak cocok.";
            exit;
        }
        $hashed_password = md5($password);
        $query = $koneksi->prepare("UPDATE pengguna SET nama = ?, password = ? WHERE email = ?");
        $query->bind_param("sss", $nama, $hashed_password, $email);
    } else {
        $query = $koneksi->prepare("UPDATE pengguna SET nama = ? WHERE email = ?");
        $query->bind_param("ss", $nama, $email);
    }

    if ($query->execute()) {
        $_SESSION['nama'] = $nama;
        session_destroy();
        header('location: ../login.php');
    } else {
        echo "Gagal update profil.";
    }
}

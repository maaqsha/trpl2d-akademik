<?php
require_once '../includes/koneksi.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mb-4">Tambah Mahasiswa</h1>
        <form action="proses.php" method="post" class="mt-3">
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" required maxlength="20">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama_mhs" class="form-control" required maxlength="100">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3 d-flex justify-content-between align-items-center gap-2">
                <a href="index.php" class="btn btn-warning">Kembali</a>
                <div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Create">
                    <input type="reset" name="reset" class="btn btn-secondary" value="Reset">
                </div>
            </div>
        </form>
    </div>
</body>

</html>
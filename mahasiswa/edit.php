<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <?php
        require(__DIR__ . '/../includes/koneksi.php');
        $edit = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$_GET[nim]'");
        $data = mysqli_fetch_array($edit);
        ?>

        <h1 class="mt-4">Form Edit Mahasiswa</h1>
        <form action="" method="post" class="mt-3">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM:</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?= $data['nim'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama_mhs" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?= $data['nama_mhs'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="4"><?= $data['alamat'] ?></textarea>
            </div>
            <div class="mb-3 d-flex justify-content-between align-items-center gap-2">
                <a href="index.php" class="btn btn-warning">Kembali</a>
                <div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Edit">
                    <input type="reset" name="reset" class="btn btn-secondary" value="Reset">
                </div>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST["submit"])) {
        $nim_new = $_POST["nim"];
        $nama = $_POST["nama_mhs"];
        $tgl = $_POST["tgl_lahir"];
        $alamat = $_POST["alamat"];
        $query = mysqli_query($koneksi, "UPDATE mahasiswa SET nim='$nim_new', nama_mhs='$nama', tgl_lahir='$tgl', alamat='$alamat' WHERE nim='$_GET[nim]'");
        if ($query) {
            Header("Location: index.php?page=mahasiswa");
        } else {
            echo "data gagal diupdate";
        }
    }
    ?>
</body>

</html>
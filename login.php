<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>


    <form action="" method="post" class="mx-5 my-5">
        <h1>Login Akademik</h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Email Admin</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Keep Login</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $pass = md5($_POST['password']);

        require 'koneksi.php';
        //cek credentials
        $ceklogin = "SELECT * FROM pengguna WHERE email='$email' AND password='$pass'";
        $result = $koneksi->query($ceklogin);

        if ($result->num_rows > 0) {
            //echo "Login berhasil!";
            session_start();
            $_SESSION['login'] = TRUE;
            $_SESSION['email'] = $email;
            header('location: index.php');
        } else {
            echo "Login gagal!";
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
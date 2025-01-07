<?php
session_start();
include_once "koneksi.php";
$username = htmlspecialchars($_POST['username']);
$password = md5(htmlspecialchars($_POST['password']));

if ($_POST['submit']) {
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    if ($cek->num_rows > 0) {
        $data = $cek->fetch_assoc();
        echo "<script>alert('Login Berhasil!')</script>";
        $_SESSION['username'] = $data['username'];
        header('Location: ./admin.php?page=dashboard');
        // echo "Login berhasil!";
    } else {
        echo "<script>alert('Login Gagal!')</script>";
        // echo "Login gagal!";
    }
}
if (isset($_SESSION['username'])) {
    header('Location: ./admin.php?page=dashboard');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-danger-subtle">
    <div class=" container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card border-0 shadow rounded-5">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <i class="bi bi-person-circle h1 display-4"></i>
                            <p>Evognito Admin</p>
                            <hr />
                        </div>
                        <form action="" method="POST">
                            <input
                                type="text"
                                name="username"
                                class="form-control my-4 py-2 rounded-4"
                                placeholder="Username" />
                            <input
                                type="password"
                                name="password"
                                class="form-control my-4 py-2 rounded-4"
                                placeholder="Password" />
                            <div class="text-center my-3 d-grid">
                                <input type="submit" name="submit" value="Login" class="btn btn-danger rounded-4">
                                <!-- <button type="submit" name="submit" class="btn btn-danger rounded-4">Login</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
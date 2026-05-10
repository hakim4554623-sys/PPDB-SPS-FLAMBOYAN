<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($query) === 1) {
        $row = mysqli_fetch_assoc($query);
        // Verifikasi password (mendukung hash atau password biasa untuk admin manual)
        if (password_verify($password, $row['password']) || $password == $row['password']) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['nama_ortu'] = $row['nama_ortu'];
            $_SESSION['role'] = $row['role'];
            
            // REDIRECT KHUSUS ADMIN & USER
            if ($row['role'] == 'admin') {
                header("Location: dashboard_admin.php");
            } else {
                header("Location: beranda.php");
            }
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Email tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SPS Flamboyan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #eef2f5; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .btn-pink { background-color: #ff8fa3; color: white; border: none; }
        .btn-pink:hover { background-color: #ff748c; }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow-lg rounded-4 p-4 text-center">
                <div class="card-body">
                    <p class="text-primary fw-bold small mb-1">SELAMAT DATANG</p>
                    <h3 class="fw-bold text-dark mb-2">Masuk Akun</h3>
                    <p class="text-muted small mb-4">Silakan masuk untuk melanjutkan proses pendaftaran atau memantau status ananda.</p>
                    
                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger small py-2"><?= $error ?></div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="mb-3 text-start">
                            <label class="form-label text-muted small">EMAIL SEKOLAH / ORANG TUA</label>
                            <input type="email" name="email" class="form-control rounded-pill px-3 bg-light border-0" placeholder="nama@email.com" required>
                        </div>
                        <div class="mb-4 text-start">
                            <label class="form-label text-muted small">KATA SANDI</label>
                            <input type="password" name="password" class="form-control rounded-pill px-3 bg-light border-0" placeholder="********" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-pink w-100 rounded-pill py-2 fw-bold">Masuk ke Dashboard 🔓</button>
                    </form>
                    
                    <div class="mt-4 small">
                        Belum punya akun? <a href="register.php" class="text-decoration-none fw-bold">Daftar Akun Baru</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
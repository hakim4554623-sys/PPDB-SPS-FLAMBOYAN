<?php
session_start();
include 'koneksi.php';

if (isset($_POST['register'])) {
    $nama_ortu = mysqli_real_escape_string($conn, $_POST['nama_ortu']);
    $nama_anak = mysqli_real_escape_string($conn, $_POST['nama_anak']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $no_wa = mysqli_real_escape_string($conn, $_POST['no_wa']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'user';

    $cek_email = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
    if (mysqli_num_rows($cek_email) > 0) {
        echo "<script>alert('Email sudah terdaftar!');</script>";
    } else {
        $query = "INSERT INTO users (nama_ortu, nama_anak, email, no_wa, password, role) 
                  VALUES ('$nama_ortu', '$nama_anak', '$email', '$no_wa', '$password', '$role')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Gagal registrasi!');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Register - SPS Flamboyan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; }
        .btn-pink { background-color: #ff8fa3; color: white; border: none; }
        .btn-pink:hover { background-color: #ff748c; }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-lg rounded-4 p-4">
                <div class="card-body">
                    <h3 class="fw-bold mb-1">Begin the Journey ✨</h3>
                    <p class="text-muted mb-4">Welcome to the digital sandbox of SPS Flamboyan. Register today.</p>
                    
                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted small">Nama Orang Tua</label>
                                <input type="text" name="nama_ortu" class="form-control rounded-3" placeholder="👤 Full Name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted small">Nama Anak</label>
                                <input type="text" name="nama_anak" class="form-control rounded-3" placeholder="🧒 Child's Name" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small">Email</label>
                            <input type="email" name="email" class="form-control rounded-3" placeholder="✉️ example@email.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small">No. WhatsApp</label>
                            <input type="text" name="no_wa" class="form-control rounded-3" placeholder="📞 0812xxxx" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-muted small">Password</label>
                            <input type="password" name="password" class="form-control rounded-3" placeholder="🔒 Min. 8 characters" minlength="8" required>
                        </div>
                        <button type="submit" name="register" class="btn btn-pink w-100 rounded-pill py-2 fw-bold">Create Account 📝</button>
                    </form>
                    
                    <div class="text-center mt-3 small">
                        Sudah punya akun? <a href="login.php" class="text-decoration-none">Login di sini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
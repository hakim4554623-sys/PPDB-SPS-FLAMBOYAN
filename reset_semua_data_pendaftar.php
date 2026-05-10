<?php
session_start();
include 'koneksi.php';

// Cek apakah yang login adalah admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Logika ketika tombol konfirmasi akhir ditekan
if (isset($_POST['konfirmasi_reset'])) {
    // Menggunakan query DELETE untuk menghapus semua isi tabel pendaftaran
    $hapus = mysqli_query($conn, "DELETE FROM pendaftaran");
    
    // (Opsional) Mengembalikan ID / Nomor Urut kembali ke 1
    mysqli_query($conn, "ALTER TABLE pendaftaran AUTO_INCREMENT = 1");

    if ($hapus) {
        echo "<script>alert('Sukses! Semua data pendaftar berhasil dihapus secara permanen.'); window.location='data_pendaftar.php';</script>";
    } else {
        echo "<script>alert('Gagal mereset data!'); window.location='pengaturan_admin.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Data - SPS Flamboyan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f4f7f6; margin: 0; font-family: 'Segoe UI', sans-serif; }
        .sidebar { width: 250px; height: 100vh; background: #fff; border-right: 1px solid #dee2e6; position: fixed; top: 0; left: 0; padding: 20px; z-index: 100; }
        .main-content { margin-left: 250px; padding: 30px; }
        .logo-text { color: #0d6efd; font-weight: 800; font-size: 1.2rem; text-decoration: none; }
        .nav-link { color: #495057; font-weight: 500; padding: 12px; border-radius: 10px; margin-bottom: 5px; display: block; text-decoration: none; }
        .nav-link:hover { background: #f8f9fa; color: #0d6efd; }
        .nav-link.active { background: #0d6efd; color: #fff; }
    </style>
</head>
<body>

    <div class="sidebar shadow-sm">
        <div class="mb-4 d-flex align-items-center">
            <i class="bi bi-mortarboard-fill fs-3 text-primary me-2"></i>
            <span class="logo-text">SPS FLAMBOYAN</span>
        </div>
        <nav>
            <a href="dashboard_admin.php" class="nav-link"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
            <a href="data_pendaftar.php" class="nav-link"><i class="bi bi-people me-2"></i> Data Pendaftar</a>
            <a href="pengaturan_admin.php" class="nav-link active"><i class="bi bi-gear me-2"></i> Pengaturan</a>
            <hr>
            <a href="logout.php" class="nav-link text-danger"><i class="bi bi-box-arrow-left me-2"></i> Keluar</a>
        </nav>
    </div>

    <div class="main-content d-flex align-items-center justify-content-center" style="min-height: 90vh;">
        <div class="card border-0 shadow-lg rounded-4 p-5 text-center" style="max-width: 600px;">
            <div class="text-danger mb-3">
                <i class="bi bi-exclamation-triangle-fill" style="font-size: 4rem;"></i>
            </div>
            <h2 class="fw-bold text-danger mb-3">PERINGATAN KERAS!</h2>
            <p class="text-muted fs-5 mb-4">
                Anda akan <b>menghapus seluruh data pendaftaran siswa</b>. Data yang sudah dihapus <u>tidak dapat dikembalikan lagi</u>. Pastikan Anda sudah mem-backup data jika diperlukan.
            </p>

            <form method="POST" action="">
                <button type="submit" name="konfirmasi_reset" id="btnReset" class="btn btn-danger btn-lg rounded-pill px-5 fw-bold shadow-sm w-100 mb-3" disabled>
                    Tunggu... (3)
                </button>
                
                <a href="pengaturan_admin.php" class="btn btn-light btn-lg rounded-pill px-5 fw-bold w-100 border">
                    Batalkan & Kembali
                </a>
            </form>
        </div>
    </div>

    <script>
        let timeLeft = 3;
        const btnReset = document.getElementById('btnReset');

        const timerId = setInterval(() => {
            timeLeft--;
            if (timeLeft <= 0) {
                clearInterval(timerId); // Hentikan timer
                btnReset.removeAttribute('disabled'); // Aktifkan tombol
                btnReset.innerHTML = '<i class="bi bi-trash-fill"></i> Ya, Hapus Semua Data Sekarang';
            } else {
                btnReset.innerHTML = `Tunggu... (${timeLeft})`;
            }
        }, 1000); // Berjalan setiap 1000 milidetik (1 detik)
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
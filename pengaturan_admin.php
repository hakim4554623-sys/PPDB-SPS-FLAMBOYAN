<?php
session_start();
// Cek apakah yang login adalah admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - SPS Flamboyan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f4f7f6; margin: 0; font-family: 'Segoe UI', sans-serif; }
        /* Style Sidebar (Sama dengan Dashboard) */
        .sidebar { 
            width: 250px; height: 100vh; background: #fff; border-right: 1px solid #dee2e6; 
            position: fixed; top: 0; left: 0; padding: 20px; z-index: 100;
        }
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

        </nav>
    </div>

    <div class="main-content">
        <h3 class="fw-bold mb-4">Pengaturan Sistem</h3>
        
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
            <h5 class="fw-bold text-primary"><i class="bi bi-door-open"></i> Buka / Tutup Pendaftaran</h5>
            <p class="text-muted">Fitur ini dapat digunakan untuk menutup akses pendaftaran pada halaman landing (index) jika kuota sudah terpenuhi.</p>
            
            <div class="form-check form-switch mb-4">
                <input class="form-check-input" type="checkbox" role="switch" id="switchDaftar" checked style="transform: scale(1.5); margin-left: -1.5em;">
                <label class="form-check-label ms-3 fw-bold" for="switchDaftar">Pendaftaran Saat Ini Dibuka</label>
            </div>
            
            <button class="btn btn-primary rounded-pill px-4 fw-bold">Simpan Perubahan</button>
        </div>

        <div class="card border-0 shadow-sm rounded-4 p-4 border-top border-danger border-4">
            <h5 class="fw-bold text-danger"><i class="bi bi-exclamation-triangle"></i> Zona Berbahaya</h5>
            <p class="text-muted mb-3">Tindakan di bawah ini tidak dapat dibatalkan.</p>
            <div>
            <button onclick="window.location.href='reset_semua_data_pendaftar.php'" class="btn btn-outline-danger rounded-pill px-4 fw-bold">Reset Semua Data Pendaftar</button>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
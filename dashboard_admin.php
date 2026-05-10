<?php
session_start();
include 'koneksi.php';

// Cek apakah yang login adalah admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Ambil data statistik dari database
$total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as jml FROM pendaftaran"))['jml'];
$pending = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as jml FROM pendaftaran WHERE status='Pending' OR status IS NULL"))['jml'];
$diterima = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as jml FROM pendaftaran WHERE status='Diterima'"))['jml'];
$ditolak = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as jml FROM pendaftaran WHERE status='Ditolak'"))['jml'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SPS Flamboyan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f4f7f6; margin: 0; font-family: 'Segoe UI', sans-serif; }
        /* Style Sidebar */
        .sidebar { 
            width: 250px; height: 100vh; background: #fff; border-right: 1px solid #dee2e6; 
            position: fixed; top: 0; left: 0; padding: 20px; z-index: 100;
        }
        .main-content { margin-left: 250px; padding: 30px; }
        .logo-text { color: #0d6efd; font-weight: 800; font-size: 1.2rem; text-decoration: none; }
        .nav-link { color: #495057; font-weight: 500; padding: 12px; border-radius: 10px; margin-bottom: 5px; display: block; text-decoration: none; }
        .nav-link:hover { background: #f8f9fa; color: #0d6efd; }
        .nav-link.active { background: #0d6efd; color: #fff; }
        /* Style Kartu */
        .stat-card { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: 0.3s; }
        .stat-card:hover { transform: translateY(-5px); }
        .hero-banner { 
            background: linear-gradient(135deg, #0d6efd 0%, #0099ff 100%); 
            color: white; border-radius: 20px; padding: 40px; margin-bottom: 30px; 
        }
    </style>
</head>
<body>

    <div class="sidebar shadow-sm">
        <div class="mb-4 d-flex align-items-center">
            <i class="bi bi-mortarboard-fill fs-3 text-primary me-2"></i>
            <span class="logo-text">SPS FLAMBOYAN</span>
        </div>
        <nav>
            <a href="dashboard_admin.php" class="nav-link active"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
            <a href="data_pendaftar.php" class="nav-link"><i class="bi bi-people me-2"></i> Data Pendaftar</a>
            <a href="pengaturan_admin.php" class="nav-link"><i class="bi bi-gear me-2"></i> Pengaturan</a>
            <hr>
            <a href="logout.php" class="nav-link text-danger"><i class="bi bi-box-arrow-left me-2"></i> Keluar</a>
        </nav>
    </div>

    <div class="main-content">
        <div class="hero-banner shadow">
            <h2 class="fw-bold">Halo Admin, Semangat Bertugas! 🚀</h2>
            <p class="opacity-75">Berikut adalah ringkasan data pendaftaran siswa baru PAUD SPS Flamboyan hari ini.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card stat-card p-4 border-start border-primary border-5">
                    <div class="text-muted small fw-bold">TOTAL PENDAFTAR</div>
                    <h2 class="fw-bold text-dark mt-2"><?= $total ?> <span class="fs-6 fw-normal">Siswa</span></h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card p-4 border-start border-warning border-5">
                    <div class="text-muted small fw-bold text-uppercase">Menunggu</div>
                    <h2 class="fw-bold text-warning mt-2"><?= $pending ?> <span class="fs-6 fw-normal text-dark">Siswa</span></h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card p-4 border-start border-success border-5">
                    <div class="text-muted small fw-bold text-uppercase">Diterima</div>
                    <h2 class="fw-bold text-success mt-2"><?= $diterima ?> <span class="fs-6 fw-normal text-dark">Siswa</span></h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card p-4 border-start border-danger border-5">
                    <div class="text-muted small fw-bold text-uppercase">Ditolak</div>
                    <h2 class="fw-bold text-danger mt-2"><?= $ditolak ?> <span class="fs-6 fw-normal text-dark">Siswa</span></h2>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
session_start();
include 'koneksi.php';

// Proteksi Halaman User
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda User - SPS Flamboyan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        
        /* Card Styling agar rapi */
        .menu-card {
            border: none;
            border-radius: 15px;
            transition: 0.3s;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            height: 100%;
        }
        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }
        .icon-box {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <?php include 'sidebar_user.php'; ?>

    <div class="main-content">
        <div class="p-4 mb-4 bg-white rounded-4 shadow-sm border-0">
            <h2 class="fw-bold text-dark">Halo, Ayah/Bunda <?php echo htmlspecialchars($_SESSION['nama_ortu']); ?>! 👋</h2>
            <p class="text-muted mb-0">Selamat datang kembali di sistem pendaftaran SPS Flamboyan.</p>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
            <div class="col">
                <div class="card menu-card p-3 text-center">
                    <div class="card-body">
                        <div class="icon-box text-primary"><i class="bi bi-info-circle"></i></div>
                        <h5 class="fw-bold">Profil Sekolah</h5>
                        <p class="small text-muted">Informasi visi, misi, dan fasilitas sekolah.</p>
                        <a href="profile_sekolah.php" class="btn btn-outline-primary btn-sm rounded-pill w-100 mt-2">Buka</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card menu-card p-3 text-center border-top border-danger border-4">
                    <div class="card-body">
                        <div class="icon-box text-danger"><i class="bi bi-pencil-square"></i></div>
                        <h5 class="fw-bold">Pendaftaran</h5>
                        <p class="small text-muted">Lengkapi formulir pendaftaran ananda.</p>
                        <a href="pendaftaran.php" class="btn btn-danger btn-sm rounded-pill w-100 mt-2 shadow-sm">Daftar</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card menu-card p-3 text-center">
                    <div class="card-body">
                        <div class="icon-box text-success"><i class="bi bi-search"></i></div>
                        <h5 class="fw-bold">Cek Status</h5>
                        <p class="small text-muted">Pantau status verifikasi pendaftaran.</p>
                        <a href="cek_status.php" class="btn btn-outline-success btn-sm rounded-pill w-100 mt-2">Lihat</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card menu-card p-3 text-center">
                    <div class="card-body">
                        <div class="icon-box text-secondary"><i class="bi bi-gear"></i></div>
                        <h5 class="fw-bold">Pengaturan</h5>
                        <p class="small text-muted">Kelola profil dan keamanan akun.</p>
                        <a href="pengaturan_user.php" class="btn btn-outline-secondary btn-sm rounded-pill w-100 mt-2">Buka</a>
                    </div>
                </div>
            </div>
        </div>

        <p class="text-center text-muted small mt-5">&copy; 2026 PAUD SPS Flamboyan - Ciomas</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
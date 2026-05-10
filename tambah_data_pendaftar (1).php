<?php
session_start();
include 'koneksi.php';

// Cek apakah yang login adalah admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if (isset($_POST['simpan_manual'])) {
    $nama_anak = mysqli_real_escape_string($conn, $_POST['nama_anak']);
    $nama_ortu = mysqli_real_escape_string($conn, $_POST['nama_ortu']);
    $pilihan_program = $_POST['pilihan_program'];
    $status = $_POST['status'];
    
    $query = "INSERT INTO pendaftaran (nama_lengkap_anak, nama_ayah, pilihan_program, status) VALUES ('$nama_anak', '$nama_ortu', '$pilihan_program', '$status')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data manual berhasil ditambahkan!'); window.location='data_pendaftar.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data - SPS Flamboyan</title>
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
            <a href="data_pendaftar.php" class="nav-link active"><i class="bi bi-people me-2"></i> Data Pendaftar</a>
            <a href="pengaturan_admin.php" class="nav-link"><i class="bi bi-gear me-2"></i> Pengaturan</a>
            <hr>
            <a href="logout.php" class="nav-link text-danger"><i class="bi bi-box-arrow-left me-2"></i> Keluar</a>
        </nav>
    </div>

    <div class="main-content">
        <h3 class="fw-bold mb-4">Tambah Data Siswa (Manual)</h3>
        
        <div class="card border-0 shadow-sm rounded-4 p-4" style="max-width: 600px;">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label text-muted fw-bold small">Nama Lengkap Anak</label>
                    <input type="text" name="nama_anak" class="form-control bg-light border-0 py-2" required>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted fw-bold small">Nama Orang Tua/Wali</label>
                    <input type="text" name="nama_ortu" class="form-control bg-light border-0 py-2" required>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted fw-bold small">Pilihan Program</label>
                    <select name="pilihan_program" class="form-select bg-light border-0 py-2" required>
                        <option value="Kelas Bermain">Kelas Bermain</option>
                        <option value="Kelas Persiapan">Kelas Persiapan TK</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label text-muted fw-bold small">Status Awal</label>
                    <select name="status" class="form-select bg-light border-0 py-2">
                        <option value="Diterima">Diterima Langsung</option>
                        <option value="Pending">Menunggu Verifikasi (Pending)</option>
                    </select>
                </div>
                
                <div class="d-flex gap-3 mt-4">
                    <button type="submit" name="simpan_manual" class="btn btn-primary rounded-pill w-50 fw-bold py-2">Simpan Data</button>
                    <a href="data_pendaftar.php" class="btn btn-outline-secondary rounded-pill w-50 fw-bold py-2">Batal</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
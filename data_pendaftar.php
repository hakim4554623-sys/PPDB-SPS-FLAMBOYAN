<?php
session_start();
include 'koneksi.php';

// Cek apakah yang login adalah admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Ambil data dari database
$pendaftar = mysqli_query($conn, "SELECT * FROM pendaftaran ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftar - SPS Flamboyan</title>
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
        /* Style Tambahan Tabel */
        .badge-pending { background-color: #ffeeba; color: #856404; }
        .badge-diterima { background-color: #d4edda; color: #155724; }
        .badge-ditolak { background-color: #f8d7da; color: #721c24; }
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold m-0">Data Pendaftar</h3>
            <a href="tambah_data_pendaftar.php" class="btn btn-primary rounded-pill fw-bold"><i class="bi bi-plus-lg"></i> Tambah Manual</a>
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-0 table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted small">
                        <tr>
                            <th class="ps-4 py-3">NO</th>
                            <th class="py-3">NAMA ANAK</th>
                            <th class="py-3">NAMA ORANG TUA</th>
                            <th class="py-3">PROGRAM</th>
                            <th class="py-3">STATUS</th>
                            <th class="text-center py-3">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; while($row = mysqli_fetch_assoc($pendaftar)): 
                            $status = $row['status'] ?? 'Pending';
                            $badgeClass = 'badge-pending';
                            if($status == 'Diterima') $badgeClass = 'badge-diterima';
                            if($status == 'Ditolak') $badgeClass = 'badge-ditolak';
                        ?>
                        <tr>
                            <td class="ps-4"><?= $no++ ?></td>
                            <td class="fw-bold"><?= htmlspecialchars($row['nama_lengkap_anak']) ?></td>
                            <td><?= htmlspecialchars($row['nama_ayah'] != '' ? $row['nama_ayah'] : $row['nama_ibu']) ?></td>
                            <td><?= htmlspecialchars($row['pilihan_program']) ?></td>
                            <td><span class="badge <?= $badgeClass ?> rounded-pill px-3 py-2"><?= $status ?></span></td>
                            <td class="text-center">
                                <a href="edit_data_pendaftar.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3">Edit</a>
                                <a href="hapus_data_pendaftar.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger rounded-pill px-3" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
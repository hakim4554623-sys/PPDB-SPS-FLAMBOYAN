<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

$user_id = $_SESSION['user_id'];
$query = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE user_id='$user_id'");
$data = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Status - SPS Flamboyan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css">
</head>
<body>
    <?php include 'sidebar_user.php'; ?>
    <div class="main-content">
        <h3 class="fw-bold mb-4">Status Pendaftaran Ananda</h3>
        <div class="card border-0 shadow-sm rounded-4 p-4">
            <?php if ($data): 
                $status = $data['status'];
                $badgeColor = 'bg-warning';
                $message = 'Berkas Anda sedang dalam tahap verifikasi oleh Admin.';
                
                if ($status == 'Diterima') {
                    $badgeColor = 'bg-success';
                    $message = 'Selamat! Ananda telah dinyatakan DITERIMA di SPS Flamboyan.';
                } elseif ($status == 'Ditolak') {
                    $badgeColor = 'bg-danger';
                    $message = 'Mohon maaf, pendaftaran ananda saat ini belum dapat kami terima.';
                }
            ?>
                <div class="row align-items-center">
                    <div class="col-md-2 text-center">
                        <i class="bi bi-info-circle-fill text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <div class="col-md-10">
                        <h5 class="fw-bold mb-1"><?= htmlspecialchars($data['nama_lengkap_anak']); ?></h5>
                        <p class="text-muted mb-2">Program: <?= htmlspecialchars($data['pilihan_program']); ?></p>
                        <span class="badge <?= $badgeColor ?> px-4 py-2 rounded-pill fs-6"><?= $status ?></span>
                        <p class="mt-3 text-dark"><?= $message ?></p>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="bi bi-file-earmark-x text-muted fs-1"></i>
                    <p class="mt-3 fs-5">Anda belum mengisi formulir pendaftaran.</p>
                    <a href="pendaftaran.php" class="btn btn-danger rounded-pill">Isi Formulir Sekarang</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
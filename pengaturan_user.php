<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

$user_id = $_SESSION['user_id'];
$u = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengaturan - SPS Flamboyan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
</head>
<body>
    <?php include 'sidebar_user.php'; ?>
    <div class="main-content">
        <h3 class="fw-bold mb-4">Pengaturan Akun</h3>
        <div class="card border-0 shadow-sm rounded-4 p-4" style="max-width: 600px;">
            <form>
                <div class="mb-3">
                    <label class="form-label small fw-bold">Nama Orang Tua</label>
                    <input type="text" class="form-control bg-light border-0" value="<?= htmlspecialchars($u['nama_ortu']); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-bold">Email</label>
                    <input type="email" class="form-control bg-light border-0" value="<?= htmlspecialchars($u['email']); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-bold">Nomor WhatsApp</label>
                    <input type="text" class="form-control bg-light border-0" value="<?= htmlspecialchars($u['no_wa']); ?>" readonly>
                </div>
                <hr>
                <p class="text-muted small">Untuk perubahan data di atas, silakan hubungi pihak sekolah.</p>
                <button type="button" class="btn btn-outline-danger btn-sm rounded-pill">Ganti Kata Sandi</button>
            </form>
        </div>
    </div>
</body>
</html>
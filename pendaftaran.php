<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

if (isset($_POST['daftar'])) {
    $user_id    = $_SESSION['user_id'];
    $nama_anak  = mysqli_real_escape_string($conn, $_POST['nama_anak']);
    $tgl_lahir  = $_POST['tgl_lahir'];
    $nama_ayah  = mysqli_real_escape_string($conn, $_POST['nama_ayah']);
    $nama_ibu   = mysqli_real_escape_string($conn, $_POST['nama_ibu']);
    $no_hp      = $_POST['no_hp'];
    $alamat     = mysqli_real_escape_string($conn, $_POST['alamat']);

    // LOGIKA UPLOAD FILE
    $folder = "uploads/";
    if (!is_dir($folder)) { mkdir($folder, 0777, true); }

    $file_kk   = time() . "_" . $_FILES['file_kk']['name'];
    $file_akta = time() . "_" . $_FILES['file_akta']['name'];

    move_uploaded_file($_FILES['file_kk']['tmp_name'], $folder . $file_kk);
    move_uploaded_file($_FILES['file_akta']['tmp_name'], $folder . $file_akta);

    $sql = "INSERT INTO pendaftar (user_id, nama_anak, tgl_lahir, nama_ayah, nama_ibu, no_hp, alamat, file_kk, file_akta, status) 
            VALUES ('$user_id', '$nama_anak', '$tgl_lahir', '$nama_ayah', '$nama_ibu', '$no_hp', '$alamat', '$file_kk', '$file_akta', 'Pending')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data Berhasil Terkirim!'); window.location='cek_status.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran - SPS Flamboyan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>body { background:#f8f9fa; } .main-content { padding: 30px; } .card { border:none; border-radius:20px; }</style>
</head>
<body>
    <?php include 'sidebar_user.php'; ?>
    
    <div class="main-content">
        <div class="container-fluid">
            <div class="card shadow-sm p-4">
                <h4 class="fw-bold text-primary mb-4"><i class="bi bi-file-earmark-text me-2"></i>Formulir Pendaftaran Siswa Baru</h4>
                
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <h6 class="fw-bold text-secondary mb-3 border-bottom pb-2">1. Data Peserta Didik</h6>
                        <div class="col-md-8 mb-3">
                            <label class="form-label">Nama Lengkap Anak</label>
                            <input type="text" name="nama_anak" class="form-control rounded-pill" placeholder="Masukkan nama lengkap anak" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control rounded-pill" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <h6 class="fw-bold text-secondary mb-3 border-bottom pb-2">2. Data Orang Tua / Wali</h6>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control rounded-pill" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Nama Ibu</label>
                            <input type="text" name="nama_ibu" class="form-control rounded-pill" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Nomor WhatsApp (Aktif)</label>
                            <input type="number" name="no_hp" class="form-control rounded-pill" placeholder="08xxxx" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control" rows="2" style="border-radius:15px;" required></textarea>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <h6 class="fw-bold text-secondary mb-3 border-bottom pb-2">3. Unggah Dokumen (Foto/Scan)</h6>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kartu Keluarga (KK)</label>
                            <input type="file" name="file_kk" class="form-control" accept="image/*,.pdf" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Akta Kelahiran</label>
                            <input type="file" name="file_akta" class="form-control" accept="image/*,.pdf" required>
                        </div>
                    </div>

                    <div class="mt-4 text-end">
                        <button type="submit" name="daftar" class="btn btn-primary px-5 py-2 rounded-pill fw-bold shadow">Kirim Pendaftaran <i class="bi bi-send ms-1"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
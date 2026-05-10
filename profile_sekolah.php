<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Sekolah - SPS Flamboyan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background: #f8f9fa; }
        .profile-card { border: none; border-radius: 20px; background: #fff; overflow: hidden; }
        .header-profile { background: #c9e4ff; padding: 40px 20px; text-align: center; color: #0d6efd; }
        .section-title { color: #ff8fa3; font-weight: 800; position: relative; display: inline-block; margin-bottom: 20px; }
        .section-title::after { content: ''; position: absolute; bottom: -5px; left: 0; width: 50px; height: 3px; background: #ff8fa3; border-radius: 5px; }
        .content-box { padding: 30px; }
        .misi-list { list-style: none; padding-left: 0; }
        .misi-list li { margin-bottom: 12px; display: flex; align-items: start; }
        .misi-list li i { color: #ff8fa3; margin-right: 12px; margin-top: 4px; }
    </style>
</head>
<body>
    <?php include 'sidebar_user.php'; ?>
    
    <div class="main-content">
        <div class="container-fluid">
            <div class="profile-card shadow-sm">
                <div class="header-profile">
                    <div style="background: white; width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; border: 3px solid #fff; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                        <img src="logo.png" style="width: 70%; object-fit: contain;">
                    </div>
                    <h2 class="fw-bold mb-1">PAUD SPS Flamboyan</h2>
                    <p class="mb-0 opacity-75">Bermain, Belajar, dan Tumbuh Ceria</p>
                </div>

                <div class="content-box">
                    <div class="mb-5">
                        <h4 class="section-title"><i class="bi bi-eye-fill me-2"></i>VISI</h4>
                        <p class="lead text-secondary" style="font-style: italic;">
                            "Terwujudnya anak usia dini yang cerdas, ceria, berakhlak mulia, dan memiliki kesiapan fisik maupun mental dalam memasuki jenjang pendidikan dasar."
                        </p>
                    </div>

                    <hr class="opacity-25 my-4">

                    <div>
                        <h4 class="section-title"><i class="bi bi-rocket-takeoff-fill me-2"></i>MISI</h4>
                        <ul class="misi-list">
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Menyelenggarakan kegiatan bermain sambil belajar yang menyenangkan bagi anak.</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Membentuk karakter anak yang religius dan memiliki sopan santun sejak dini.</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Menjalin kerjasama yang harmonis dengan orang tua dan masyarakat dalam mendidik anak.</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Meningkatkan profesionalisme tenaga pendidik dalam mengasuh anak usia dini.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4 text-muted small">
                <p>&copy; 2026 SPS Flamboyan - Ciomas, Bogor</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
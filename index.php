<?php session_start(); include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - SPS Flamboyan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #fff; font-family: sans-serif; }
        .hero-box { background: #c9e4ff; border-radius: 25px; margin: 40px auto; padding: 60px 20px; text-align: center; max-width: 900px; width: 92%; }
        .btn-pink { background: #ff8fa3; color: #fff; border-radius: 50px; padding: 12px 35px; font-weight: 700; text-decoration: none; display: inline-block; box-shadow: 0 4px 15px rgba(255,143,163,0.4); border: none; }
    </style>
</head>
<body>
    <nav class="container py-3 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center fw-bold text-primary">
            <div style="width:38px;height:38px;background:#fff;border-radius:50%;margin-right:10px;display:flex;align-items:center;justify-content:center;border:1px solid #eee;overflow:hidden;"><img src="logo.png" style="width:85%"></div>
            SPS Flamboyan
        </div>
        <a href="login.php" style="border:1px solid #ddd;border-radius:50px;padding:5px 20px;color:#777;text-decoration:none;">Login 👋</a>
    </nav>
    <div class="container">
        <div class="hero-box shadow-sm">
            <div style="font-size:3.5rem; margin-bottom:15px;">🎈 🧸 🎨</div>
            <h1 style="color:#0d6efd; font-weight:800; font-size:2rem; margin-bottom:10px;">Selamat Datang di PPDB<br>PAUD SPS Flamboyan</h1>
            <p style="color:#555; font-size:1.1rem; margin-bottom:30px;">Mari bermain, belajar, dan tumbuh ceria bersama kami!</p>
            <a href="register.php" class="btn-pink">Daftar Akun Baru 🚀</a>
        </div>
    </div>
</body>
</html>
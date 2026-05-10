<?php $current_page = basename($_SERVER['PHP_SELF']); ?>
<style>
    @media (min-width: 992px) {
        .sidebar-user { width: 260px; height: 100vh; position: fixed; top: 0; left: 0; background: #fff; border-right: 1px solid #eee; z-index: 1000; padding: 25px 15px; }
        .main-content { margin-left: 260px; padding: 30px; }
        .mobile-nav { display: none; }
    }
    @media (max-width: 991.98px) {
        .sidebar-user { display: none; }
        .main-content { margin-left: 0; padding: 20px; padding-top: 80px; }
        .mobile-nav { display: flex; position: fixed; top: 0; left: 0; width: 100%; z-index: 1100; background: #fff; border-bottom: 1px solid #eee; padding: 12px 20px; align-items: center; justify-content: space-between; }
    }
    
    /* LOGO FIX: Lingkaran Putih Rapi */
    .logo-wrapper { 
        width: 50px; height: 50px; 
        background: white !important; 
        border-radius: 50%; 
        display: flex; align-items: center; justify-content: center; 
        margin-right: 12px; overflow: hidden; 
        border: 2px solid #f0f0f0; flex-shrink: 0;
    }
    .logo-wrapper img { width: 90%; height: 90%; object-fit: contain; }
    
    .brand-section { display: flex; align-items: center; text-decoration: none; margin-bottom: 30px; }
    .brand-name { font-weight: 850; font-size: 1.1rem; color: #ff8fa3; margin: 0; }
    .nav-link-custom { color: #5f6368; font-weight: 500; padding: 12px 18px; border-radius: 12px; margin-bottom: 8px; display: flex; align-items: center; text-decoration: none; transition: 0.2s; }
    .nav-link-custom i { font-size: 1.2rem; margin-right: 12px; }
    .nav-link-custom:hover { background: #fff0f3; color: #ff8fa3; }
    .nav-link-custom.active { background: #ff8fa3; color: #fff !important; box-shadow: 0 4px 10px rgba(255, 143, 163, 0.3); }
</style>

<div class="mobile-nav shadow-sm">
    <div class="d-flex align-items-center">
        <div class="logo-wrapper" style="width: 38px; height: 38px;"><img src="logo.png"></div>
        <span class="brand-name">SPS FLAMBOYAN</span>
    </div>
    <button class="btn btn-light" data-bs-toggle="offcanvas" data-bs-target="#mn"><i class="bi bi-list fs-3"></i></button>
</div>

<div class="sidebar-user shadow-sm">
    <a href="beranda.php" class="brand-section">
        <div class="logo-wrapper"><img src="logo.png"></div>
        <h1 class="brand-name">SPS FLAMBOYAN</h1>
    </a>
    <div class="nav flex-column">
        <a href="beranda.php" class="nav-link-custom <?= ($current_page == 'beranda.php') ? 'active' : '' ?>"><i class="bi bi-grid-1x2-fill"></i> Beranda</a>
        <a href="pendaftaran.php" class="nav-link-custom <?= ($current_page == 'pendaftaran.php') ? 'active' : '' ?>"><i class="bi bi-pencil-square"></i> Pendaftaran</a>
        <a href="cek_status.php" class="nav-link-custom <?= ($current_page == 'cek_status.php') ? 'active' : '' ?>"><i class="bi bi-search-heart"></i> Cek Status</a>
        <hr>
        <a href="logout.php" class="nav-link-custom text-danger"><i class="bi bi-box-arrow-left"></i> Logout</a>
    </div>
</div>

<div class="offcanvas offcanvas-start" id="mn" style="width: 280px;">
    <div class="offcanvas-header border-bottom">
        <h5 class="brand-name mb-0">SPS FLAMBOYAN</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body"><a href="beranda.php" class="nav-link-custom active"><i class="bi bi-grid-1x2-fill"></i> Beranda</a><a href="logout.php" class="nav-link-custom text-danger"><i class="bi bi-box-arrow-left"></i> Keluar</a></div>
</div>
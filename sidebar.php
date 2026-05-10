<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<style>
    /* Layout Desktop */
    @media (min-width: 992px) {
        .sidebar { width: 260px; height: 100vh; position: fixed; top: 0; left: 0; background: #fff; border-right: 1px solid #dee2e6; z-index: 1000; padding: 20px; }
        .main-content { margin-left: 260px; padding: 30px; }
        .mobile-nav-admin { display: none; }
    }
    /* Layout Mobile */
    @media (max-width: 991.98px) {
        .sidebar { display: none; }
        .main-content { margin-left: 0; padding: 20px; padding-top: 80px; }
        .mobile-nav-admin { display: flex; position: fixed; top: 0; width: 100%; z-index: 1100; background: #fff; border-bottom: 1px solid #dee2e6; padding: 15px; }
    }
    .logo-container { display: flex; align-items: center; text-decoration: none; color: #0d6efd; margin-bottom: 30px; }
    .logo-img { width: 40px; height: 40px; object-fit: contain; margin-right: 10px; }
    .logo-text { font-weight: 800; font-size: 1.1rem; letter-spacing: 0.5px; }
    .nav-link { color: #495057; font-weight: 500; padding: 12px 15px; border-radius: 10px; margin-bottom: 5px; display: flex; align-items: center; transition: 0.3s; }
    .nav-link i { margin-right: 10px; font-size: 1.1rem; }
    .nav-link:hover { background: #f8f9fa; color: #0d6efd; }
    .nav-link.active { background: #0d6efd; color: #fff !important; }
</style>

<div class="mobile-nav-admin align-items-center justify-content-between shadow-sm px-3">
    <div class="d-flex align-items-center">
        <img src="logo.png" alt="Logo" class="logo-img">
        <span class="logo-text text-primary">ADMIN SPS</span>
    </div>
    <button class="btn btn-light border" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar">
        <i class="bi bi-list fs-4"></i>
    </button>
</div>

<div class="sidebar shadow-sm">
    <div class="logo-container">
        <img src="logo.png" alt="Logo" class="logo-img">
        <span class="logo-text">SPS FLAMBOYAN</span>
    </div>
    <nav class="nav flex-column">
        <a href="dashboard_admin.php" class="nav-link <?= ($current_page == 'dashboard_admin.php') ? 'active' : '' ?>">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a href="data_pendaftar.php" class="nav-link <?= ($current_page == 'data_pendaftar.php' || $current_page == 'edit_data_pendaftar.php') ? 'active' : '' ?>">
            <i class="bi bi-people"></i> Data Pendaftar
        </a>
        <a href="pengaturan_admin.php" class="nav-link <?= ($current_page == 'pengaturan_admin.php' || $current_page == 'reset_semua_data_pendaftar.php') ? 'active' : '' ?>">
            <i class="bi bi-gear"></i> Pengaturan
        </a>
        <hr>
        <a href="logout.php" class="nav-link text-danger fw-bold">
            <i class="bi bi-box-arrow-left"></i> Logout
        </a>
    </nav>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="adminSidebar" style="width: 280px;">
    <div class="offcanvas-header border-bottom">
        <div class="d-flex align-items-center">
            <img src="logo.png" alt="Logo" class="logo-img">
            <span class="logo-text text-primary">ADMIN PANEL</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <nav class="nav flex-column">
            <a href="dashboard_admin.php" class="nav-link <?= ($current_page == 'dashboard_admin.php') ? 'active' : '' ?>"><i class="bi bi-speedometer2"></i> Dashboard</a>
            <a href="data_pendaftar.php" class="nav-link <?= ($current_page == 'data_pendaftar.php') ? 'active' : '' ?>"><i class="bi bi-people"></i> Data Pendaftar</a>
            <a href="pengaturan_admin.php" class="nav-link <?= ($current_page == 'pengaturan_admin.php') ? 'active' : '' ?>"><i class="bi bi-gear"></i> Pengaturan</a>
            <hr>
            <a href="logout.php" class="nav-link text-danger fw-bold"><i class="bi bi-box-arrow-left"></i> Keluar</a>
        </nav>
    </div>
</div>
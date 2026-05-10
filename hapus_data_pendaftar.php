<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') { 
    header("Location: login.php"); 
    exit; 
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hapus = mysqli_query($conn, "DELETE FROM pendaftaran WHERE id='$id'");
    
    if ($hapus) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='data_pendaftar.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='data_pendaftar.php';</script>";
    }
}
?>
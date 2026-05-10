<?php
// Mulai sesi untuk mengenali sesi mana yang sedang aktif
session_start();

// Hapus semua variabel sesi
$_SESSION = [];

// Hancurkan sesi sepenuhnya
session_destroy();

// Arahkan pengguna kembali ke halaman login (atau index)
header("Location: index.php");
exit;
?>
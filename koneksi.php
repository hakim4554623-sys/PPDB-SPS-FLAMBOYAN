<?php
$host = "localhost";
$user = "root";
$pass = ""; // Sesuaikan jika ada password di XAMPP/Laragon kamu
$db   = "db_ppdb_flamboyan";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
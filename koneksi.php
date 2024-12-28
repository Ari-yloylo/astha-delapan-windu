<?php
$servername = "localhost";  // Nama server database Anda
$username = "root";         // Nama pengguna database
$password = "";             // Password pengguna database
$dbname = "perusahaan_db";  // Nama database yang Anda gunakan

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

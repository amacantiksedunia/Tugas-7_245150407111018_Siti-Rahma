<?php
// Sertakan kelas Database
require_once 'config/Database.php';  // Ganti dengan path yang sesuai

// Membuat instance dari kelas Database untuk cek koneksi
$db = new Database();

// Jika tidak ada error dalam koneksi, akan berhasil menyambung ke database
echo "Koneksi ke database berhasilllll!";
?>

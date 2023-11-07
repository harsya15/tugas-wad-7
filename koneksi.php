<?php
$host = "localhost"; // Sesuaikan dengan host Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$database = "laundry"; // Ganti dengan nama database Anda

// Buat koneksi ke database
$koneksi = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>

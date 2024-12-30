<?php
$host = 'localhost'; // Ganti dengan host database Anda
$db = 'bookroom'; // Ganti dengan nama database Anda
$user = 'root'; // Ganti dengan username database Anda
$pass = ''; // Ganti dengan password database Anda

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
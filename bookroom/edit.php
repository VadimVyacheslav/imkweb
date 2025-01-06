<?php
session_start();
include 'konek.php'; // Koneksi ke database

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.html"); // Redirect ke halaman login
    exit();
}

// Ambil user_id dari session
$user_id = $_SESSION['user_id'];

// Ambil data dari form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash password jika diisi
if (!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE users SET name='$name', email='$email', password='$hashed_password' WHERE id='$user_id'";
} else {
    $query = "UPDATE users SET name='$name', email='$email' WHERE id='$user_id'";
}

// Eksekusi query
if ($conn->query($query) === TRUE) {
    // Redirect ke halaman profil setelah berhasil update
    header("Location: profil.php");
    exit();
} else {
    echo "Error updating record: " . $conn->error;
}
?>
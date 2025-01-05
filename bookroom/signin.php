<?php
session_start();
include 'konek.php'; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk memeriksa username dan password
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($query);
    $user = $result->fetch_assoc();

    // Verifikasi password
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: profil.php"); // Redirect ke halaman profil
    } else {
        echo "Username atau password salah!";
    }
}
?>
<?php
session_start(); // Memulai session
include 'konek.php'; // Menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mengambil data pengguna
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id']; // Simpan ID pengguna di session
            echo "Login berhasil!";
            header("Location: home.html"); // Redirect ke halaman home
        } else {
            echo "Password salah!";
        }
    } else {
        echo "Email tidak ditemukan!";
    }
}

$conn->close();
?>
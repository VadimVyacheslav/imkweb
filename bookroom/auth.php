<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.html"); // Redirect ke halaman login
    exit();
}
?>
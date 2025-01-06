<?php
include 'konek.php'; // Menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $nokartu = password_hash($_POST['nokartu'], PASSWORD_DEFAULT); 
    $expdate = password_hash($_POST['expdate'], PASSWORD_DEFAULT); 
    $cvv = password_hash($_POST['cvv'], PASSWORD_DEFAULT); 


    // Query untuk menyimpan data pengguna
    $sql = "INSERT INTO pembayaran (name, nokartu, expdate, cvv) VALUES ('$name', '$nokartu', '$expdate', '$cvv')";

    if ($conn->query($sql) === TRUE) {
        echo "Pembayaran berhasil!";
        header("Location: signin.html"); // Redirect ke halaman login
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
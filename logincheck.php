<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sdhshop";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form login
$email = mysqli_real_escape_string($conn, $_POST['email']); // Melakukan escape pada email untuk mencegah serangan SQL Injection
$password = mysqli_real_escape_string($conn, $_POST['password']); // Melakukan escape pada password untuk mencegah serangan SQL Injection

// Perintah SQL untuk memeriksa kecocokan email dan password
$sql = "SELECT * FROM pengguna WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Login berhasil
    echo "success";
} else {
    // Email atau password tidak cocok
    echo "error";
}

// Tutup koneksi
mysqli_close($conn);
?>

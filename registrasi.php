<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "sdhshop";

$connection = mysqli_connect($host, $username, $password, $database);

// Periksa koneksi
if (!$connection) {
  die("Tidak terhubung ke database: " . mysqli_connect_error());
}

// Ambil data dari formulir
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$password = $_POST['password'];

// Query untuk memasukkan data ke tabel pengguna (ganti dengan nama tabel yang sesuai)
$query = "INSERT INTO pengguna (nama, no_hp, alamat, email, password) VALUES ('$nama', '$no_hp', '$alamat', '$email', '$password')";

// Eksekusi query
if (mysqli_query($connection, $query)) {
  echo "Data berhasil dimasukkan ke database";
} else {
  echo "Gagal memasukkan data ke database: " . mysqli_error($connection);
}

// Tutup koneksi
mysqli_close($connection);
?>

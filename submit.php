<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$email = $_POST['exampleInputEmail1'];
$password = $_POST['exampleInputPassword1'];

// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO your_table_name (nama, no_hp, alamat, email, password) VALUES (:nama, :no_hp, :alamat, :email, :password)");
$stmt->bindParam(':nama', $nama);
$stmt->bindParam(':no_hp', $no_hp);
$stmt->bindParam(':alamat', $alamat);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();

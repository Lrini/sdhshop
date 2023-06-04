<?php

//create database connection 
$servername = "localhost" ;
$username = "monart" ;
$password = "%M051c1A)%(" ;
$dbname = "sdhshop" ;

//create connection
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Retrieve form data
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
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

// Close database connection
$conn = null;
?>
<?php
session_start();
include "koneksi.php";
 
//ambil email dan password dari halaman index
$email = $_POST['email'];
$pass =md5($_POST['pass']);



$data = mysqli_query($koneksi," select * from user where email ='$email' and pass ='$pass'");
$cek = mysqli_num_rows($data);
if($cek > 0){
	$_SESSION['email'] = $email;
	header("location:user/index.php");
}else{
	header("location:index.php?pesan=gagal");
}



?>
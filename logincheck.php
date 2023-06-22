<?php
<<<<<<< HEAD
session_start();
include "koneksi.php";
 
//ambil email dan password dari halaman index
$email = $_POST['email'];
$pass =md5($_POST['pass']);



$data = mysqli_query($koneksi," select * from user where email ='$email' and pass ='$pass'");
$cek = mysqli_num_rows($data); 
$data2 = mysqli_fetch_array($data);
if($cek > 0){
	if($data2['level']=='user'){
		if($data2['status'] == 'aktif'){
			session_start();
			$_SESSION['id'] = $data2['id_user'];
			$_SESSION['name'] = $data2['nama'];
			header("location:user/index.php");
		}else{
			echo '<script>alert("akun anda belum aktif mohon menunggu");window.location="index.php"</script>';
		}
	}elseif($data2['level']=='admin'){
	if($data2['status']=='aktif'){
		session_start();
		$_SESSION['id'] = $data2['id_user'];
		$_SESSION['name'] = $data2['nama'];
		header("location:admin/index.php");
	}else{
		echo '<script>alert("akun anda belum aktif mohon menunggu");window.location="index.php"</script>';
	}
	}
}
?>
=======
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
>>>>>>> 67cb8619a3851a91f0b5e5c2622f7578e79f4318

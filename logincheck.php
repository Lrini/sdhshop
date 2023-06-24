<?php
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
			echo "
			<script>
				document.location.href = 'index.php?r=info';
			</script>
			";
		}
	}elseif($data2['level']=='admin'){
	if($data2['status']=='aktif'){
		session_start();
		$_SESSION['id'] = $data2['id_user'];
		$_SESSION['name'] = $data2['nama'];
		header("location:admin/index.php");
	}else{
		echo "
			<script>
				document.location.href = 'index.php?r=info';
			</script>
			";
	}
	}
}else {
	echo "
			<script>
				document.location.href = 'index.php?r=gagal';
			</script>
			";
}
?>
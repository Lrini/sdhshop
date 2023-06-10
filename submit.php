<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$pass = $_POST['pass'];

//buat encrypt password
$password = hash('md5','$pass');

$data = mysqli_query($koneksi,"insert into user (nama,alamat,no_hp,email,pass,level,status) values ('$nama','$alamat','$no_hp','$email','$password','user','pasif')");
//cek kemabli apakah data sudah berhasil masuk ke mysql atau tidak jika tidak akan munculkan alert gagal registrasi
//kalau berhasil akan pergi kehalaman dalam folder user 
if($data > 0){
                        echo'    <script>alert("berhasil");window.location="user/index.php"</script>';

                }
            else
            {
                ?>
                <div style="color: red;font-size: 30px">
                <center>
                <b>Gagal registrasi  !!</b>
                </center>
                </div>
                <?php
            }
?>
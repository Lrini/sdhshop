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
$kelas = $_POST['id_kelas'];
$konfirm = $_POST['konfirm'];

$password = md5($pass);

$data = mysqli_query($koneksi,"insert into user (nama,alamat,no_hp,email,pass,konfirm,level,status,id_kelas) values ('$nama','$alamat','$no_hp','$email','$password','$konfirm','user','pasif','$kelas')");
//cek kemabli apakah data sudah berhasil masuk ke mysql atau tidak jika tidak akan munculkan alert gagal registrasi
//kalau berhasil akan pergi kehalaman dalam folder user 
if($data > 0){
    echo "
                <script>
                    document.location.href = 'index.php?d=sukses';
                </script>
                ";

                }
            else
            {
                echo "
                <script>
                    document.location.href = 'index.php?d=gagal';
                </script>
                ";
            }
?>
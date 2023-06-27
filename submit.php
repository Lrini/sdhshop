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

$password = md5($pass);

$data = mysqli_query($koneksi,"insert into user (nama,alamat,no_hp,email,pass,level,status) values ('$nama','$alamat','$no_hp','$email','$password','user','pasif')");
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

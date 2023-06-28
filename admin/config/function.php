<?php
$kon = mysqli_connect("localhost","root","","sdhshop");

function query($query){
    global $kon;
    $result = mysqli_query($kon,$query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
//function untuk tambah data atau simpan data
function tambahadmin(){
    global $kon;
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $pass=$_POST['pass'];
    $konfirm = $_POST['konfirm'];

    $password = md5($pass);

     $sql = mysqli_query($kon,"insert into user (nama,no_hp,alamat,email,pass,konfirm,level,status) values ('$nama','$no_hp','$alamat','$email','$password','$konfirm','admin','pasif')");
     return mysqli_affected_rows($kon);

}

function tambahuser(){
    global $kon;
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $pass=$_POST['pass'];
    $konfirm = $pass;
    $password = md5($pass);
    $kelas = $_POST['id_kelas'];

     $sql = mysqli_query($kon,"insert into user (nama,no_hp,alamat,email,pass,konfirm,id_kelas,level,status) values ('$nama','$no_hp','$alamat','$email','$password','$konfirm','$kelas','user','pasif')");
     return mysqli_affected_rows($kon);

}


//function untuk edit data
function editadmin(){
    global $kon;
    $user =$_POST['id_user'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $konfirm = $_POST['konfirm'];

    $pass = md5($konfirm);
     $sql = mysqli_query($kon,"update user set nama='$nama',no_hp='$no_hp',alamat='$alamat',email='$email',pass='$pass',konfirm='$konfirm' where id_user='$user'");
     return mysqli_affected_rows($kon);

}

function editsd(){
    global $kon;
    $user =$_POST['id_user'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $konfirm = $_POST['konfirm'];
    $status = $_POST['status'];
    $pass = md5($konfirm);
     $sql = mysqli_query($kon,"update user set nama='$nama',no_hp='$no_hp',alamat='$alamat',email='$email',pass='$pass',konfirm='$konfirm',status='$status' where id_user='$user'");
     return mysqli_affected_rows($kon);

}
//function untuk hapus data 
function hapusadmin($id_user){
    global $kon;
    $sql =mysqli_query($kon,"DELETE FROM user where id_user=$id_user");
    return mysqli_affected_rows($kon);
}

function hapussd($id_user){
    global $kon;
    $sql =mysqli_query($kon,"DELETE FROM user where id_user=$id_user");
    return mysqli_affected_rows($kon);
}
?>
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

    $password = md5($pass);

     $sql = mysqli_query($kon,"insert into user (nama,no_hp,alamat,email,pass,level,status) values ('$nama','$no_hp','$alamat','$email','$password','admin','pasif')");
     return mysqli_affected_rows($kon);

}

function tambahuser(){
    global $kon;
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $pass=$_POST['pass'];

    $password = md5($pass);

     $sql = mysqli_query($kon,"insert into user (nama,no_hp,alamat,email,pass,level,status) values ('$nama','$no_hp','$alamat','$email','$password','user','pasif')");
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
    $pass = $_POST['pass'];
     $sql = mysqli_query($kon,"update user set nama='$nama',no_hp='$no_hp',alamat='$alamat',email='$email',pass='$pass' where id_user='$user'");
     return mysqli_affected_rows($kon);

}

//function untuk hapus data 
function hapusadmin($id_user){
    global $kon;
    $sql =mysqli_query($kon,"DELETE FROM user where id_user=$id_user");
    return mysqli_affected_rows($kon);
}
?>
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

function editadmin(){
    global $kon;
    $user =$_POST['id_user'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
     $sql = mysqli_query($kon,"update user set nama='$nama',no_hp='$no_hp',email='$email',pass='$pass' where id_user='$user'");
     return mysqli_affected_rows($kon);

}

?>
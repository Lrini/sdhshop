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

function tambahsmp(){
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

function tambahsma(){
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

function tambahkelas(){
    global $kon;
    $nama_kelas = $_POST['nama_kelas'];
    $walikelas = $_POST['walikelas'];
    $status = $_POST['status'];

    $sql = mysqli_query($kon, "insert into kelas (nama_kelas,walikelas,status) values ('$nama_kelas','$walikelas','$status')");
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

function editsmp(){
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

function editsma(){
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

function editkelas(){
    global $kon;
    $kelas = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $wali = $_POST['walikelas'];
    $status = $_POST['status'];
    $sql = mysqli_query($kon,"update kelas set nama_kelas ='$nama_kelas', walikelas='$wali', status='$status' where id_kelas='$kelas'");
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

function hapussmp($id_user){
    global $kon;
    $sql =mysqli_query($kon,"DELETE FROM user where id_user=$id_user");
    return mysqli_affected_rows($kon);
}

function hapussma($id_user){
    global $kon;
    $sql =mysqli_query($kon,"DELETE FROM user where id_user=$id_user");
    return mysqli_affected_rows($kon);
}

function hapuskelas($id_kelas){
    global $kon;
    $sql= mysqli_query($kon,"DELETE FROM kelas WHERE id_kelas=$id_kelas");
    return mysqli_affected_rows($kon);
}
?>
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
//gambar
function gambar(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tipe = $_FILES['gambar']['tmp_name'];

    //cek apa tidak ada gambar yang di upload 
    if (($error === 4)) {
        echo "<script>
                alert ('pilih gambar terlebih dahulu');
                </script>";
    return false;
    }
    //cek gambar atau bukan 
    $ekstensi = ['jpg','jpeg','png'];
    $eks = explode('.', $namaFile);
    $eks = strtolower(end($eks));
    if (!in_array($eks, $ekstensi)) {
        echo "<script>
                alert ('bukan gambar');
                </script>";
        return false;
    }

    //cek ukuran gambar 
    if ($ukuranFile >500000) {
        echo "<script>
                alert ('ukuran terlalu besar');
                </script>";
    }
    //lolos cek generete nama baru 
    //$namabaru = uniqid();
    //var_dump($namabaru);die;
    //$namabaru .= '.';
    //$namabaru .= $eks;
    move_uploaded_file($tipe, '../data/'.$namaFile);
    //var_dump($namaFile);die;
    return $namaFile;

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

function tambahbaju(){
    global $kon;
    $nama = $_POST['nama_baju'];
    $kelas = $_POST['id_kelas'];
    $jmlh = $_POST['jmlh'];
    $status = $_POST['status'];

    $gambar = gambar();
    if (!$gambar){
        return false;
    }

    $sql = mysqli_query($kon,"insert into baju (nama_baju,gambar,id_kelas,jmlh,status) values ('$nama','$gambar','$kelas','$jmlh','$status')");
    return mysqli_affected_rows($kon);
}

function tambahcelana(){
    global $kon;
    $nama= $_POST['nama_celana'];
    $kelas = $_POST['id_kelas'];
    $jmlh = $_POST['jmlh'];
    $status = $_POST['status'];
    $gambar = gambar();
    if (!$gambar){
        return false;
    }

    $sql = mysqli_query($kon,"insert into celana (nama_celana,id_kelas,jmlh,status,gambar) values ('$nama','$kelas','$jmlh','$status','$gambar')");
    return mysqli_affected_rows($kon);
}
function tambahbrng(){
    global $kon;
    $nama= $_POST['nama_brng'];
    $kelas = $_POST['id_kelas'];
    $jmlh = $_POST['jmlh'];
    $status = $_POST['status'];
    $gambar = gambar();
    if (!$gambar){
        return false;
    }

    $sql = mysqli_query($kon,"insert into barang (nama_brng,id_kelas,jmlh,status,gambar) values ('$nama','$kelas','$jmlh','$status','$gambar')");
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

function editbaju(){
    global $kon;
    $baju= $_POST['id_baju'];
    $nama = $_POST['nama_baju'];
    $jmlh = $_POST['jmlh'];
    $kelas = $_POST['id_kelas'];
    $status = $_POST['status'];
    $data1 = mysqli_query($kon,"update baju set nama_baju='$nama',id_kelas='$kelas',jmlh='$jmlh', status='$status' where id_baju = '$baju'");
    return mysqli_affected_rows($kon);
}

function editcelana () {
    global $kon;
    $celana = $_POST['id_celana'];
    $nama = $_POST['nama_celana'];
    $jmlh = $_POST['jmlh'];
    $kelas = $_POST['id_kelas'];
    $status = $_POST['status'];
    $sql = mysqli_query($kon,"update celana set nama_celana='$nama',jmlh='$jmlh',id_kelas='$kelas',status='$status' where id_celana = '$celana'");
    return mysqli_affected_rows($kon);
}

function editbarang(){
    global $kon;
    $id = $_POST['id_barang'];
    $barang = $_POST['nama_barang'];
    $kelas = $_POST['id_kelas'];
    $jmlh = $_POST['jmlh'];
    $status = $_POST['status'];

    $sql = mysqli_query($kon,"update barang set nama_brng='$barang',id_kelas='$kelas',jmlh='$jmlh',status='$status' where id_barang='$id'");
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

function hapusbaju($id_baju){
    global $kon;
    $sql = mysqli_query($kon,"select * from baju where id_baju = $id_baju");
    $data = mysqli_fetch_array($sql);

    if(is_file("../../data/".$data['gambar'])) unlink("../../data/".$data['gambar']);
    mysqli_query($kon,"delete from baju where id_baju = $id_baju");
    return mysqli_affected_rows($kon);
}
function hapuscelana($id_celana){
    global $kon;
    $sql = mysqli_query($kon,"select * from celana where id_celana = $id_celana");
    $data = mysqli_fetch_array($sql);

    if(is_file("../../data/".$data['gambar'])) unlink("../../data/".$data['gambar']);
    mysqli_query($kon,"delete from celana where id_celana = $id_celana");
    return mysqli_affected_rows($kon);
}
function hapusbarang($id_barang){
    global $kon;
    $sql = mysqli_query($kon,"select * from barang where id_barang = $id_barang");
    $data = mysqli_fetch_array($sql);

    if(is_file("../../data/".$data['gambar'])) unlink("../../data/".$data['gambar']);
    mysqli_query($kon,"delete from barang where id_barang = $id_barang");
    return mysqli_affected_rows($kon);
}
?>
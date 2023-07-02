<?php
include "../koneksi.php";

function getKelasById($id)
{
    global $koneksi;
    $sql = "SELECT * FROM kelas WHERE id_kelas='$id'";
    $result = mysqli_query($koneksi, $sql);
    $kelas = mysqli_fetch_assoc($result);
    return $kelas;
}

function updateKelas($id, $namaKelas, $waliKelas)
{
    global $koneksi;
    $sql = "UPDATE kelas SET nama_kelas='$namaKelas', walikelas='$waliKelas' WHERE id_kelas='$id'";
    if (mysqli_query($koneksi, $sql)) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $kelasId = $_POST['kelas_id'];
    $namaKelas = $_POST['nama_kelas'];
    $waliKelas = $_POST['wali_kelas'];

    if (updateKelas($kelasId, $namaKelas, $waliKelas)) {
        echo "Kelas berhasil diperbarui!<br>";
        echo "ID Kelas: " . $kelasId . "<br>";
        echo "Nama Kelas: " . $namaKelas . "<br>";
        echo "Wali Kelas: " . $waliKelas . "<br><br>";
    } else {
        echo "Error: Gagal memperbarui kelas.<br>";
    }
}
?>

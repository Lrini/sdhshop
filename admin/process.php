<?php
include "../koneksi.php";

// Proses tambah kelas
if (isset($_POST['nama_kelas']) && isset($_POST['wali_kelas'])) {
    $nama_kelas = $_POST['nama_kelas'];
    $wali_kelas = $_POST['wali_kelas'];

    // Lakukan proses tambah kelas ke database
    $query = "INSERT INTO kelas (nama_kelas, walikelas) VALUES ('$nama_kelas', '$wali_kelas')";
    if (mysqli_query($koneksi, $query)) {
        echo "Kelas berhasil ditambahkan";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
    exit();
}

// Proses edit kelas
if (isset($_GET['edit_id'])) {
    $id_kelas = $_GET['edit_id'];

    // Ambil data kelas dari database berdasarkan id_kelas
    $query = "SELECT * FROM kelas WHERE id_kelas = $id_kelas";
    $result = mysqli_query($koneksi, $query);
    $kelas = mysqli_fetch_assoc($result);

    // Mengembalikan data kelas dalam format JSON
    echo json_encode($kelas);
    exit();
}

// Proses hapus kelas
if (isset($_GET['hapus_id'])) {
    $id_kelas = $_GET['hapus_id'];

    // Lakukan proses hapus kelas dari database
    $query = "DELETE FROM kelas WHERE id_kelas = $id_kelas";
    if (mysqli_query($koneksi, $query)) {
        echo "Kelas berhasil dihapus";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
    exit();
}
?>

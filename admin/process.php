<?php
include "../koneksi.php";

// Tambah Kelas
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_kelas = $_POST['nama_kelas'];
    $wali_kelas = $_POST['wali_kelas'];

    $query = "INSERT INTO kelas (nama_kelas, walikelas) VALUES ('$nama_kelas', '$wali_kelas')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

// Edit Kelas
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];

    // Mendapatkan data kelas yang akan diedit
    $query = "SELECT * FROM kelas WHERE id_kelas = $edit_id";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    // Menampilkan data dalam bentuk JSON
    echo json_encode($data);
}

// Update Kelas
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $nama_kelas = $_POST['nama_kelas'];
    $wali_kelas = $_POST['wali_kelas'];

    $query = "UPDATE kelas SET nama_kelas = '$nama_kelas', walikelas = '$wali_kelas' WHERE id_kelas = $update_id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

// Hapus Kelas
if (isset($_GET['hapus_id'])) {
    $hapus_id = $_GET['hapus_id'];

    $query = "DELETE FROM kelas WHERE id_kelas = $hapus_id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<?php
include "../koneksi.php";

// Proses tambah kelas
if (isset($_POST['nama_kelas']) && isset($_POST['wali_kelas'])) {
    $nama_kelas = $_POST['nama_kelas'];
    $wali_kelas = $_POST['wali_kelas'];

    // Validasi data
    if (empty($nama_kelas) || empty($wali_kelas)) {
        echo "Nama Kelas dan Wali Kelas harus diisi.";
        exit();
    }

    // Lakukan proses tambah kelas ke database dengan prepared statements
    $query = "INSERT INTO kelas (nama_kelas, walikelas) VALUES (?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $nama_kelas, $wali_kelas);

    if (mysqli_stmt_execute($stmt)) {
        echo "Kelas berhasil ditambahkan";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    exit();
}

// Proses edit kelas
if (isset($_POST['edit_id_kelas']) && isset($_POST['edit_nama_kelas']) && isset($_POST['edit_wali_kelas'])) {
    $id_kelas = $_POST['edit_id_kelas'];
    $nama_kelas = $_POST['edit_nama_kelas'];
    $wali_kelas = $_POST['edit_wali_kelas'];

    // Validasi data
    if (empty($id_kelas) || !is_numeric($id_kelas) || empty($nama_kelas) || empty($wali_kelas)) {
        echo "Data kelas tidak valid.";
        exit();
    }

    // Lakukan proses edit kelas di database dengan prepared statements
    $query = "UPDATE kelas SET nama_kelas = ?, walikelas = ? WHERE id_kelas = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 'ssi', $nama_kelas, $walikelas, $id_kelas);

    if (mysqli_stmt_execute($stmt)) {
        echo "Kelas berhasil diperbarui";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    exit();
}

// Proses hapus kelas
if (isset($_GET['hapus_id'])) {
    $id_kelas = $_GET['hapus_id'];

    // Validasi id_kelas
    if (empty($id_kelas) || !is_numeric($id_kelas)) {
        echo "ID Kelas tidak valid.";
        exit();
    }

    // Lakukan proses hapus kelas dari database dengan prepared statements
    $query = "DELETE FROM kelas WHERE id_kelas = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id_kelas);

    if (mysqli_stmt_execute($stmt)) {
        echo "Kelas berhasil dihapus";
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    exit();
}
?>

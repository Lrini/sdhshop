<?php
session_start();
include "../koneksi.php";

if (isset($_GET['id_kelas'])) {
    $id_kelas = $_GET['id_kelas'];

    // Proses update kelas
    if (!empty($_POST)) {
        $nama_kelas = $_POST['nama_kelas'];
        $wali_kelas = $_POST['wali_kelas'];

        // Validasi data
        if (empty($nama_kelas) || empty($wali_kelas)) {
            $msg = "Nama Kelas dan Wali Kelas harus diisi.";
        } else {
            // Lakukan proses update kelas di database
            $query = "UPDATE kelas SET nama_kelas = ?, walikelas = ? WHERE id_kelas = ?";
            $stmt = mysqli_prepare($koneksi, $query);
            mysqli_stmt_bind_param($stmt, 'ssi', $nama_kelas, $wali_kelas, $id_kelas);

            if (mysqli_stmt_execute($stmt)) {
                $msg = "Kelas berhasil diperbarui";
            } else {
                $msg = "Error: " . mysqli_stmt_error($stmt);
            }

            mysqli_stmt_close($stmt);
        }
    }

    // Ambil data kelas dari database
    $query = "SELECT * FROM kelas WHERE id_kelas = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id_kelas);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $kelas = mysqli_fetch_assoc($result);

    if (!$kelas) {
        exit('Kelas doesn\'t exist with that ID!');
    }

    mysqli_stmt_close($stmt);
} else {
    exit('No ID specified!');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Kelas</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="content update">
        <h2>Update Kelas #<?= $kelas['id_kelas'] ?></h2>
        <form action="editkelas.php?id_kelas=<?= $kelas['id_kelas'] ?>" method="post">
            <label for="nama_kelas">Nama Kelas</label>
            <input type="text" name="nama_kelas" value="<?= $kelas['nama_kelas'] ?>" id="nama_kelas">
            <label for="wali_kelas">Wali Kelas</label>
            <input type="text" name="wali_kelas" value="<?= $kelas['walikelas'] ?>" id="wali_kelas">
            <input type="submit" value="Update">
        </form>
        <?php if (isset($msg)) : ?>
            <p><?= $msg ?></p>
        <?php endif; ?>
    </div>
</body>

</html>

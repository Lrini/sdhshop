<?php
session_start();
include "../koneksi.php";
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}
?>

<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_kelas = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $wali_kelas = $_POST['wali_kelas'];

    $query = mysqli_query($koneksi, "UPDATE kelas SET nama_kelas = '$nama_kelas', walikelas = '$wali_kelas' WHERE id_kelas = '$id_kelas'");

    if ($query) {
        // Pembaruan data berhasil
        header("Location: kelas.php");
        exit();
    } else {
        // Terjadi kesalahan dalam pembaruan data
        echo "Terjadi kesalahan dalam pembaruan data: " . mysqli_error($koneksi);
    }
}


// Ambil data kelas berdasarkan id_kelas yang dikirim melalui parameter
if (isset($_GET['id_kelas'])) {
    $id_kelas = $_GET['id_kelas'];

    $query = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'");
    $data = mysqli_fetch_array($query);
} else {
    // Jika tidak ada id_kelas yang diberikan, kembali ke halaman "kelas.php"
    header("Location: kelas.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Kelas</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div id="layout-wrapper">
        <div class="main-content">
            <?php include "public/header.php"; ?>
            <?php include "public/akun.php"; ?>

            <div class="topnav">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                        <?php include "public/menu.php"; ?>
                    </nav>
                </div>
            </div>

            <div class="page-content">
                <div class="container-fluid">
                    <h2>Edit Kelas</h2>

                    <form id="formEditKelas" method="POST">
                        <div class="form-group">
                            <label for="id_kelas">ID Kelas</label>
                            <input type="text" class="form-control" id="id_kelas" name="id_kelas" value="<?php echo $data['id_kelas']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?php echo $data['nama_kelas']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="wali_kelas">Wali Kelas</label>
                            <input type="text" class="form-control" id="wali_kelas" name="wali_kelas" value="<?php echo $data['walikelas']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
                <!-- End Page-content -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-center text-lg-left">
                                    2020 © Mazmur.arya,shanen.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-right d-none d-lg-block">
                                    Design & Develop by Lrini
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <?php include "public/footer.php"; ?>
        </div>
    </div>
</body>

</html>

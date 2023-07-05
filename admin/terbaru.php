<?php
session_start();
include "../koneksi.php";
if (!isset($_SESSION['id'])) {
?>
    <script type="text/javascript">
        alert('Harap login terlebih dahulu');
        window.location = 'index.php';
    </script>
<?php
} else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Management</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="assets/css/jquery.dataTables.css">
</head>

<body>
    <div id="layout-wrapper">

        <div class="main-content">
            <?php include "public/header.php"; ?>
            <!-- Halaman akun -->
            <?php include "public/akun.php"; ?>

            <div class="topnav">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                        <!-- Halaman menu -->
                        <?php include "public/menu.php"; ?>
                    </nav>
                </div>
            </div>

            <div class="page-content">
                <div class="container-fluid">
                    <!-- Judul halaman -->
                    <h2>Management Kelas</h2>

                    <!-- Tombol Tambah -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                        Tambah Kelas
                    </button>

                    <!-- Tabel Kelas -->
                    <table class="table dt-responsive nowrap" id="kelasTable">
                        <thead>
                            <tr>
                                <th>ID Kelas</th>
                                <th>Nama Kelas</th>
                                <th>Wali Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM kelas");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $data['id_kelas']; ?></td>
                                    <td><?php echo $data['nama_kelas']; ?></td>
                                    <td><?php echo $data['walikelas']; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-primary edit-data">Edit</a>
                                        <a href="#" class="btn btn-danger hapus-data">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Modal Tambah Kelas -->
                    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahModalLabel">Tambah Kelas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="process.php" method="POST">
                                        <div class="form-group">
                                            <label for="nama_kelas">Nama Kelas</label>
                                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="wali_kelas">Wali Kelas</label>
                                            <input type="text" class="form-control" id="wali_kelas" name="wali_kelas" placeholder="Masukkan Nama Wali Kelas" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "public/footer.php"; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#kelasTable').DataTable();

            // Aksi Edit
            $('.edit-data').click(function(e) {
                e.preventDefault();
                // Logika untuk edit data
            });

            // Aksi Hapus
            $('.hapus-data').click(function(e) {
                e.preventDefault();
                // Logika untuk hapus data
            });
        });
    </script>
</body>

</html>
<?php
}
?>

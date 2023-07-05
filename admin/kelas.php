<?php
session_start();
include "../koneksi.php";
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Kelas</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="assets/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#kelasTable').DataTable();

            $('.edit-data').click(function(e) {
                e.preventDefault();
                var id_kelas = $(this).data('id');

                // Lakukan aksi edit data dengan menggunakan id_kelas
                // Misalnya, tampilkan modal edit dengan data kelas yang sesuai
                $.ajax({
                    url: 'process.php',
                    method: 'GET',
                    data: {
                        edit_id: id_kelas
                    },
                    dataType: 'json',
                    success: function(data) {
                        // Logika untuk menampilkan data dalam modal edit
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $('.hapus-data').click(function(e) {
                e.preventDefault();
                var id_kelas = $(this).data('id');

                // Lakukan aksi hapus data dengan menggunakan id_kelas
                // Misalnya, konfirmasi penghapusan dan lakukan penghapusan data melalui AJAX
                $.ajax({
                    url: 'process.php',
                    method: 'GET',
                    data: {
                        hapus_id: id_kelas
                    },
                    success: function() {
                        // Refresh halaman atau hapus baris tabel yang dihapus
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $('#formTambahKelas').submit(function(e) {
                e.preventDefault();
                var form = $(this);

                // Lakukan aksi tambah data melalui AJAX
                $.ajax({
                    url: 'process.php',
                    method: 'POST',
                    data: form.serialize(),
                    success: function() {
                        // Refresh halaman atau tambahkan baris tabel dengan data yang baru ditambahkan
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
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
                    <h2>Form Kelas</h2>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                        Tambah Kelas
                    </button>

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
                                        <a href="#" class="btn btn-primary edit-data" data-id="<?php echo $data['id_kelas']; ?>">Edit</a>
                                        <a href="#" class="btn btn-danger hapus-data" data-id="<?php echo $data['id_kelas']; ?>">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

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
                                    <form id="formTambahKelas" method="POST">
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
        </div>
        <?php include "public/footer.php"; ?>
    </div>
</body>

</html>

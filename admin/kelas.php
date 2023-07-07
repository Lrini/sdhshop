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
    <style>
        /* Gaya CSS tambahan */
        .btn {
            margin-right: 5px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#kelasTable').DataTable();

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

            $('.edit-data').click(function(e) {
                e.preventDefault();
                var id_kelas = $(this).data('id');

                // Ambil data kelas dari server melalui AJAX
                $.ajax({
                    url: 'process.php',
                    method: 'GET',
                    data: {
                        id_kelas: id_kelas
                    },
                    dataType: 'json',
                    success: function(data) {
                        // Isi nilai input dalam modal edit dengan data yang diterima
                        $('#editModalLabel').text('Edit Kelas');
                        $('#edit_id_kelas').val(data.id_kelas);
                        $('#edit_nama_kelas').val(data.nama_kelas);
                        $('#edit_wali_kelas').val(data.walikelas);
                        $('#editModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $('#formEditKelas').submit(function(e) {
                e.preventDefault();
                var form = $(this);

                // Lakukan aksi update data melalui AJAX
                $.ajax({
                    url: 'update_kelas.php',
                    method: 'POST',
                    data: form.serialize(),
                    success: function() {
                        // Refresh halaman atau perbarui baris tabel dengan data yang telah diperbarui
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

                    <br><br>
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
                                    <a href="update_kelas.php?id_kelas=<?php echo $data['id_kelas']; ?>" class="btn btn-primary">Edit</a>

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

                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Kelas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formEditKelas" method="POST">
                                        <input type="hidden" id="edit_id_kelas" name="id_kelas">
                                        <div class="form-group">
                                            <label for="edit_nama_kelas">Nama Kelas</label>
                                            <input type="text" class="form-control" id="edit_nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_wali_kelas">Wali Kelas</label>
                                            <input type="text" class="form-control" id="edit_wali_kelas" name="wali_kelas" placeholder="Masukkan Nama Wali Kelas" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

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

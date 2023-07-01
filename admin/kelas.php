<?php
session_start();
include "../koneksi.php";
if (!isset($_SESSION['id'])) {
?>
    <script type="text/javascript">
        alert('login dulu');
        window.location = '../index.php';
    </script>
<?php
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include "public/header.php"; ?> <!-- halaman untuk asset css pada halaman-->
        <meta charset="utf-8" />
        <!--dattables js-->
        <link rel="stylesheet" href="assets/css/jquery.dataTables.css">
    </head>


    <body>

        <!-- Begin page -->
        <div id="layout-wrapper">

            <div class="main-content">
                <?php include "public/akun.php"; ?>
                <div class="topnav">
                    <div class="container-fluid">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                            <!--halaman untuk menu-->
                            <?php include "public/menu.php" ?>
                        </nav>
                    </div>
                </div>
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <?php if (isset($_GET['r'])) : ?>
                            <?php
                            $r = $_GET['r'];
                            if ($r == 'sukses') {
                                $class = 'success';
                            } else if ($r == 'updated') {
                                $class = 'info';
                            } else if ($r == 'gagal') {
                                $class = 'danger';
                            } else if ($r == 'added an account') {
                                $class = 'success';
                            } else {
                                $class = 'hide';
                            }
                            ?>
                            <div role="alert" class="alert alert-<?php echo $class ?> ">

                                <strong> <?php echo $r; ?>!</strong>
                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Form untuk kelas</h4>
                                        <p class="card-subtitle mb-4">Halaman untuk input kelas. Sebelumnya harus dipastikan sebelumnya</p>

                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Nama kelas</label>
                                                <input type="text" class="form-control" name="nama_kelas" placeholder="Nama kelas">
                                            </div>
                                            <div class="form-group">
                                                <label>Walikelas</label>
                                                <input type="text" class="form-control" name="walikelas" placeholder="Walikelas">
                                            </div>
                                            <div class="form-group">
                                                <label>Tingkat</label>
                                                <select name="status" id="status" class="form-control" type="text">
                                                    <option>Tingkat</option>
                                                        <option value="SD">SD</option>
                                                        <option value="SMP">SMP</option>
                                                        <option value="SMA">SMA</option>
                                                </select>
                                            </div>
                                            <button type="submit" name="simpan" value="simpan" class="btn btn-primary waves-effect waves-light">Submit</button>
                                        </form>
                                        <?php
                                        include "config/function.php";
                                        if (isset($_POST['simpan'])) {
                                            if (tambahkelas($_POST) > 0) {
                                                echo " 
                                                       <script>
                                                            document.location.href = 'kelas.php?r=sukses';
                                                        </script>";
                                            } else {
                                                echo " 
                                                       <script>
                                                            document.location.href = 'kelas.php?r=gagal';
                                                        </script>";
                                            }
                                        }
                                        ?>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!--end size form-->
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table class="table dt-responsive nowrap" id="contoh">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama kelas</th>
                                            <th>Walikelas</th>
                                            <th>Tingkat</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        include("../koneksi.php");
                                        $no = 1;
                                        $query = mysqli_query($koneksi, "select * from kelas");
                                        while ($data = mysqli_fetch_array($query)) {
                                            echo "<tr>";
                                            echo "<td>$no";
                                            echo "<td>$data[nama_kelas]</td>";
                                            echo "<td>$data[walikelas]</td>";
                                            echo "<td>$data[status]</td>";
                                            echo "<td>
                                        <a href = '#' class='edit_data5 btn btn-sm btn-primary' id='" . $data['id_kelas'] . "'>Edit</a>
                                        <a href = 'config/hapuskelas.php?id_user=" . $data['id_kelas'] . "' class='btn btn-sm btn-danger'>Hapus</a>
                                    </td>
                                    ";
                                            echo "</tr>";
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end page title -->
                    </div> <!-- container-fluid -->

                    <div id="editData5" class="modal fade">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Form siswa tingkat sekolah dasar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="info_update5">
                                    <?php include "./modal/kelas.php" ?>
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
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script><!-- -->
        <script src="assets/js/jquery.dataTables.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(document).on('click', '.edit_data5', function() {
                    var edit_id5 = $(this).attr('id');
                    $.ajax({
                        url: "./modal/kelas.php",
                        type: "post",
                        data: {
                            edit_id5: edit_id5
                        },
                        success: function(data) {
                            $("#info_update5").html(data);
                            jQuery.noConflict();
                            $("#editData5").modal('show');
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#contoh').DataTable();
            });
        </script>
        <!--Halaman foote asset-->
        <?php include "public/footer.php"; ?>
    </body>

    </html>
<?php
}
?>
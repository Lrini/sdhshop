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

                                        <h4 class="card-title">Form untuk tambahan</h4>
                                        <p class="card-subtitle mb-4">Halaman untuk barang tambahan seperti topi,dasi dan kaos kaki </p>

                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Nama barang</label>
                                                <input type="text" class="form-control" name="nama_brng" placeholder="Nama barang">
                                            </div>
                                            <?php
                                            include "../koneksi.php";
                                            $query = mysqli_query($koneksi, "select * from kelas");
                                            ?>
                                            <div class="form-group">
                                                <label>Kelas</label>
                                                <select name="id_kelas" id="id_kelas" class="form-control" type="text">
                                                    <option>Kelas</option>
                                                    <?php
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <option value="<?php echo $data['id_kelas'] ?>"><?php echo $data['id_kelas'] ?>|<?php echo $data['nama_kelas'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah barang</label>
                                                <input type="text" class="form-control" name="jmlh" placeholder="Jumlah barang">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputName1">Gambar</label>
                                                <br>
                                                <label>untuk foto besar maks 500kb dan nama foto tidak menggunakan spasi</label>
                                                <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar barang">
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" id="status" class="form-control" type="text">
                                                    <option>Status</option>
                                                    <option value="aktif">Aktif</option>
                                                    <option value="pasif">Pasif</option>

                                                </select>
                                            </div>
                                            <button type="submit" name="simpan" value="simpan" class="btn btn-primary waves-effect waves-light">Submit</button>
                                        </form>
                                        <?php
                                        include "config/function.php";
                                        if (isset($_POST['simpan'])) {
                                            if (tambahbrng($_POST) > 0) {
                                                echo " 
                                                       <script>
                                                            document.location.href = 'tambahan.php?r=sukses';
                                                        </script>";
                                            } else {
                                                echo " 
                                                       <script>
                                                            document.location.href = 'tambahan.php?r=gagal';
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
                                            <th>Nama barang</th>
                                            <th>kelas</th>
                                            <th>Jumlah barang</th>
                                            <th>Status</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        include("../koneksi.php");
                                        $no = 1;
                                        $query = mysqli_query($koneksi, "SELECT barang.id_barang,barang.nama_brng,barang.jmlh,barang.status,kelas.nama_kelas FROM barang INNER JOIN kelas WHERE barang.id_kelas=kelas.id_kelas");
                                        while ($data = mysqli_fetch_array($query)) {
                                            echo "<tr>";
                                            echo "<td>$no";
                                            echo "<td>$data[nama_brng]</td>";
                                            echo "<td>$data[nama_kelas]</td>";
                                            echo "<td>$data[jmlh]</td>";
                                            echo "<td>$data[status]</td>";
                                            echo "<td>
                                        <a href = '#' class='edit_data5 btn btn-sm btn-info' id='" . $data['id_barang'] . "'>Gambar</a>
                                        <a href = '#' class='edit_data3 btn btn-sm btn-primary' id='" . $data['id_barang'] . "'>Edit</a>
                                        <a href = 'config/hapusbarang.php?id_barang=" . $data['id_barang'] . "' class='btn btn-sm btn-danger'>Hapus</a>
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
                                    <h5 class="modal-title">Detail gambar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="info_update5">
                                    <?php include "./modal/barang.php" ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--modal edit -->
                    <div id="editData3" class="modal fade">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit data baju </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="info_update3">
                                    <?php include "./modal/editbarang.php" ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--modal edit-->
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
                        url: "./modal/barang.php",
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
        <script type="text/javascript">
            $(document).ready(function() {
                $(document).on('click', '.edit_data3', function() {
                    var edit_id3 = $(this).attr('id');
                    $.ajax({
                        url: "./modal/editbarang.php",
                        type: "post",
                        data: {
                            edit_id3: edit_id3
                        },
                        success: function(data) {
                            $("#info_update3").html(data);
                            jQuery.noConflict();
                            $("#editData3").modal('show');
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
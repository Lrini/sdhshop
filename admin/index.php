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
    </head>


    <body>

        <!-- Begin page -->
        <div id="layout-wrapper">

            <div class="main-content">
                <?php include "public/akun.php" ?>
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
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <h5 class="card-title mb-0">Jumlah Tingakatan SD</h5>
                                        </div>
                                        <div class="row d-flex align-items-center mb-4">
                                            <div class="col-8">
                                                <h2 class="d-flex align-items-center mb-0">
                                                    $17.21
                                                </h2>
                                            </div>
                                            <div class="col-4 text-right">
                                                <span class="text-muted">12.5% <i class="mdi mdi-arrow-up text-success"></i></span>
                                            </div>
                                        </div>

                                        <div class="progress shadow-sm" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 57%;">
                                            </div>
                                        </div>
                                    </div>
                                    <!--end card body-->
                                </div><!-- end card-->
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <h5 class="card-title mb-0">Tingkatan SMP </h5>
                                        </div>
                                        <div class="row d-flex align-items-center mb-4">
                                            <div class="col-8">
                                                <h2 class="d-flex align-items-center mb-0">
                                                    $1875.54
                                                </h2>
                                            </div>
                                            <div class="col-4 text-right">
                                                <span class="text-muted">18.71% <i class="mdi mdi-arrow-down text-danger"></i></span>
                                            </div>
                                        </div>

                                        <div class="progress shadow-sm" style="height: 5px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 57%;">
                                            </div>
                                        </div>
                                    </div>
                                    <!--end card body-->
                                </div><!-- end card-->
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <h5 class="card-title mb-0">SMA</h5>
                                        </div>
                                        <div class="row d-flex align-items-center mb-4">
                                            <div class="col-8">
                                                <h2 class="d-flex align-items-center mb-0">
                                                    $784.62
                                                </h2>
                                            </div>
                                            <div class="col-4 text-right">
                                                <span class="text-muted">57% <i class="mdi mdi-arrow-up text-success"></i></span>
                                            </div>
                                        </div>

                                        <div class="progress shadow-sm" style="height: 5px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 57%;">
                                            </div>
                                        </div>
                                    </div>
                                    <!--end card body-->
                                </div>
                                <!--end card-->
                            </div> <!-- end col-->
                            <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <h5 class="card-title mb-0">Jumlah Penjualan</h5>
                                        </div>
                                        <div class="row d-flex align-items-center mb-4">
                                            <div class="col-8">
                                                <h2 class="d-flex align-items-center mb-0">
                                                    $784.62
                                                </h2>
                                            </div>
                                            <div class="col-4 text-right">
                                                <span class="text-muted">57% <i class="mdi mdi-arrow-up text-success"></i></span>
                                            </div>
                                        </div>

                                        <div class="progress shadow-sm" style="height: 5px;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 57%;">
                                            </div>
                                        </div>
                                    </div>
                                    <!--end card body-->
                                </div>
                                <!--end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end page title -->
                    </div> <!-- container-fluid -->
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


        <!--Halaman foote asset-->
        <?php include "public/footer.php"; ?>

    </body>

    </html>
<?php
}
?>
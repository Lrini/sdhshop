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

                <header id="page-topbar">
                    <div class="navbar-header">
                        <!-- LOGO -->
                        <div class="navbar-brand-box d-flex align-items-left">
                            <a href="index.ejs" class="logo">
                                <!--<i class="mdi mdi-album"></i> ganti dengan logo SDH -->
                                <span>
                                   <!-- Xeloro-->
                                </span>
                            </a>

                            <button type="button" class="btn btn-sm mr-2 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                                <i class="fa fa-fw fa-bars"></i>
                            </button>
                        </div>
        
                        <div class="d-flex align-items-center">       
                            <div class="dropdown d-inline-block ml-2">
                                <button type="button" class="btn header-item waves-effect waves-light"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-3.jpg"
                                        alt="Header Avatar">
                                    <span class="d-none d-sm-inline-block ml-1">Immanuel</span>
                                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                        <span>Log Out</span>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </header>

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
                                                    <span class="text-muted">12.5% <i
                                                            class="mdi mdi-arrow-up text-success"></i></span>
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
                                                <span class="text-muted">18.71% <i
                                                        class="mdi mdi-arrow-down text-danger"></i></span>
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
                                                <span class="text-muted">57% <i
                                                        class="mdi mdi-arrow-up text-success"></i></span>
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
                                                <span class="text-muted">57% <i
                                                        class="mdi mdi-arrow-up text-success"></i></span>
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
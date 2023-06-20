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
                        <div class="col-xl-6">
                        <div class="card">
                                    <div class="card-body">
                        
                                        <h4 class="card-title">Form Admin</h4>
                                        <p class="card-subtitle mb-4">Halaman untuk input admin yang menggunakan halaman admin ini</p>
    
                                        <form>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                        </form>
                        
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                             </div> <!--end size form-->
                        </div>     
                       <div class="card">
                            <div class="card-body">
                            <table class="table dt-responsive nowrap" id="contoh"  >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Admin</th>
                                        <th>No Handphone</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php
                                include ("../koneksi.php");
                                $no = 1;
                                $query = mysqli_query($koneksi,"SELECT * FROM user where level ='admin'");
                                while($data = mysqli_fetch_array($query)){
                                    echo "<tr>";
                                    echo "<td>$no";
                                    echo "<td>$data[nama]</td>";
                                    echo "<td>$data[no_hp]</td>";
                                    echo "<td>$data[email]</td>";
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
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script><!-- -->
        <script src="assets/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function(){
             $('#contoh').DataTable();
                                        });
        </script>
        <!--Halaman foote asset-->
       <?php include "public/footer.php"; ?>
    </body>

</html>
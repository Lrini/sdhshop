<!doctype html>
<html lang="zxx">

<head>
  <meta charset="utf-8">

  <!-- site title -->
  <title>Sekolah Dian Harapan Kupang Shop</title>

  <meta name="description" content="aruk - multipurpose ecommerce store, electronic shop, fashion store">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- favicons and shortcut icons -->
  <link rel="apple-touch-icon" href="icon.png"><!--ganti menjadi logo sekolah-->
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">


  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- stylesheets -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/line-awesome.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/slick.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/jquery.nice-number.css">
  <link rel="stylesheet" href="css/mean-menu.css">
  <link rel="stylesheet" href="css/default.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <!-- scroll top button -->
  <div id="scrollToTop" class="scrollTop">
    <i class="las la-arrow-up"></i>
  </div>
  <!-- =============Preloader Starts=============-->
  <div class="loader">
    <div class="face face-1">
      <div class="circle"></div>
    </div>
    <div class="face face-2">
      <div class="circle"></div>
    </div>
  </div>
  <!-- =============Preloader Ends=============-->

  <!-- auto-popup starts-->
  <div id="autopopup-option" class="auto_popup position-fixed pt-100 pb-115">
    <div id="close-button" class="position-absolute">
      <button class="bg-transparent">X</button>
    </div>
    <h3 class=" pb-15">Pengumuman</h3>
    <p>Untuk Orang tua atau wali yang belum mempunyai akun silakan melakukan registrasi
    </p>
  </div>
  <!-- auto_popup ends -->

  <!-- header area starts -->
  <header>
    <div class="header-1 header-2 pt-35 pb-35">
      <div class="container">
        <div class="row">
          <div class="col-xl-5 col-lg-5 col-md-3 col-sm-2 col-2">
            <div class="menu-bar ">

              <!-- <button>ME <br>NU</button>-->
            </div>
            <div class="mobile-menu2"></div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-7 col-5">
            <div class="logo ">
              <a href="index.html"><img src="img/logo/sdhkupang.png" alt="aruk-logo"></a>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-5">
            <div class="nav-icons">
              <ul>
                <li>
                  <div class="search position-relative">
                    <span><i class="fas fa-search"></i></span>
                    <div class="search-overlap">
                    </div>
                    <form action="#" class="search-form position-fixed">
                      <div class="search-input">
                        <div class="search-close">
                          <span>X</span>
                        </div>
                        <input type="text" placeholder="Enter your keywords.....">
                      </div>
                    </form>
                  </div>
                </li>
                <li>
                  <a type="button" data-toggle="modal" data-target="#exampleModal">Sign In</a>
                </li>
                <li>
                  <a type="button" data-toggle="modal" data-target="#exampleModal1">Sign Up</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="mobile-menu"></div>
      </div>
    </div>
  </header>
  <!-- header area ends -->
  <!-- Modal Login -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="logincheck.php">
            <div class="form-group">
              <label>Email address</label>
              <input type="email" class="form-control" name="email" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="pass" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <!--tutup modal Login-->

  <!-- Modal register -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form register</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="submit.php" method="post">
            <div class="form-group">
              <label>Nama anak anda:</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama anda ">
            </div>
            <div class="form-group">
              <label>No handphone</label>
              <input type="text" class="form-control" name="no_hp" placeholder="No handphone yang dapat dihubungi">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat" placeholder="alamat anda">
            </div>
            <div class="form-group">
              <label>Email address</label>
              <input type="email" class="form-control" name="email" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <?php
            include "koneksi.php";
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
              <label>Password</label>
              <input type="password" class="form-control" name="pass" placeholder="Password">
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input type="text" class="form-control" name="konfirm" placeholder="Konfirmasi password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <from action="submit.php" method="POST">
    <!--tutup modal register-->
    <!-- slider area starts -->
    <div class="slider-area slider-2 pt-105">
      <div class="single-slide slider-height position-relative">
        <div class="container">
          <div class="row">
            <div class="main-content">
              <div class="container-fluid">
                <?php
                if (isset($_GET['r'])) {
                  $r = $_GET['r'];
                  if ($r == 'gagal') {
                    echo "
                              <div role='alert' class='alert alert-danger'>
                                <strong>Username atau password salah !</strong>    
                              </div>
                          
                          ";
                  } else if ($r == 'info') {
                    echo "
                              <div role='alert' class='alert alert-info'>
                                <strong>Silakan sign up terlebih dahulu !</strong>    
                              </div>
                          
                          ";
                  }
                }
                ?>
                <?php
                if (isset($_GET['d'])) {
                  $r = $_GET['d'];
                  if ($r == 'gagal') {
                    echo "
                            <div role='alert' class='alert alert-danger'>
                              <strong> Gagal register silakan ulangi lagi!</strong>    
                            </div>
                        
                        ";
                  } else if ($r == 'sukses') {
                    echo "
                            <div role='alert' class='alert alert-info'>
                              <strong>Berhasil register. Menunggu konfirmasi via whatsapp dari admin SDH Kupang !</strong>    
                            </div>
                        
                        ";
                  }
                }
                ?>
              </div>
            </div>
            <div class="col-xl-5 col-lg-5  col-md-6">
              <div class="slider-description mt-200">
                <h1>Seragam <br> TK </h1>
                <p class="pb-30">Lorem ipsum dolor sit
                  Amet, cons ectetur adip
                  Isicing elit, sed do eiusmo</p>
              </div>
            </div>
            <div class="slider-images ">
              <div class="slider-image-bg">
                <img src="img/slider-area/slider-2.png" alt="headset">
                <span class="slider-price-badge">
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="single-slide slider-height position-relative">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-5  col-md-6">
              <div class="slider-description mt-200">
                <h1>Seragam <br> SD</h1>
                <p class="pb-30">Lorem ipsum dolor sit
                  Amet, cons ectetur adip
                  Isicing elit, sed do eiusmo</p>
              </div>
            </div>
            <div class="slider-images ">
              <div class="slider-image-bg">
                <img src="img/slider-area/slider-2.png" alt="headset">
                <span class="slider-price-badge">
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="single-slide slider-height position-relative">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-5  col-md-6">
              <div class="slider-description mt-200">
                <h1>Seragam <br>SMP</h1>
                <p class="pb-30">Lorem ipsum dolor sit
                  Amet, cons ectetur adip
                  Isicing elit, sed do eiusmo</p>

              </div>
            </div>
            <div class="slider-images ">
              <div class="slider-image-bg">
                <img src="img/slider-area/slider-2.png" alt="headset">
                <span class="slider-price-badge">
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="single-slide slider-height position-relative">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-5  col-md-6">
              <div class="slider-description mt-200">
                <h1>Seragam <br> SMA</h1>
                <p class="pb-30">Lorem ipsum dolor sit
                  Amet, cons ectetur adip
                  Isicing elit, sed do eiusmo</p>

              </div>
            </div>
            <div class="slider-images ">
              <div class="slider-image-bg">
                <img src="img/slider-area/slider-2.png" alt="headset">
                <span class="slider-price-badge">
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- slider area ends -->
    <!-- Service Area Start -->
    <div class="service-area pt-85 pl-30">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="service-widget d-flex justify-content-center justify-content-md-start mb-30 mb-md-0">
              <div class="service-img mr-20">
                <img src="img/icon/icon1.png" alt="icon">
              </div>
              <div class="service-details">
                <h5>Pengambilan Barang</h5>
                <span>Pengambilan barang bedasarkan jadwal yang kan dikirimkan oleh pihak sekolah</span>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="service-widget d-flex justify-content-center justify-content-md-start mb-30 mb-md-0">
              <div class="service-img mr-20">
                <img src="img/icon/icon2.png" alt="icon">
              </div>
              <div class="service-details">
                <h5>Pembayaran</h5>
                <span>Pembayaran dilakukan secara cash disekolah</span>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="service-widget justify-content-center justify-content-lg-start d-flex">
              <div class="service-img mr-20">
                <img src="img/icon/icon3.png" alt="icon">
              </div>
              <div class="service-details">
                <h5>Penggunaan</h5>
                <span>Bisa diakses kapan saja dan dimana saja menggunakan akun yang sudah terdaftar</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Service Area Ends -->
    <!-- Category Area Start  -->
    <div class="category-area  pt-110">
      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
            <div class="category-items overflow-hidden mb-30 mb-lg-0 pt-15 pb-20">
              <div class="category-img  ">
                <img src="img/products/7.png" alt="bag">
              </div>
              <div class="product-name text-center pt-30">
                <h6><a href="shop_grid.html">Bags</a></h6>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
            <div class="category-items overflow-hidden mb-30 mb-lg-0 pt-15 pb-20">
              <div class="category-img  ">
                <img src="img/products/8.png" alt="Shoes">
              </div>
              <div class="product-name text-center pt-30">
                <h6><a href="shop_grid.html">Shoes</a></h6>

              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
            <div class="category-items overflow-hidden pt-15 pb-20 mb-30 mb-sm-0">
              <div class="category-img ">
                <img src="img/products/9.png" alt="Furnitures">
              </div>
              <div class="product-name text-center pt-30">
                <h6><a href="shop_grid.html">Furnitures</a></h6>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
            <div class="category-items overflow-hidden pt-15 pb-20">
              <div class="category-img">
                <img src="img/products/10.png" alt="Electronics">
              </div>
              <div class="product-name text-center pt-30">
                <h6><a href="shop_grid.html">Electronics</a></h6>
              </div>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="pt-25"></div>
        </div>
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
            <div class="category-items overflow-hidden mb-30 mb-lg-0 pt-15 pb-20">
              <div class="category-img">
                <img src="img/products/11.png" alt="bag">
              </div>
              <div class="product-name text-center pt-30">
                <h6><a href="shop_grid.html">Kitchen Items</a></h6>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
            <div class="category-items overflow-hidden mb-30 mb-lg-0 pt-15 pb-20">
              <div class="category-img">
                <img src="img/products/12.png" alt="Shoes">
              </div>
              <div class="product-name text-center pt-30">
                <h6><a href="shop_grid.html">Cosmetics</a></h6>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
            <div class="category-items overflow-hidden pt-15 pb-20">
              <div class="category-img ">
                <img src="img/products/13.png" alt="Furnitures">
              </div>
              <div class="product-name text-center pt-30">
                <h6><a href="shop_grid.html">House Decor</a></h6>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 d-flex justify-content-center align-items-center">
            <div class=" more-items  mt-30 mt-sm-0 ">
              <div class="category-img position-relative text-center">
                <img src="img/products/14.png" alt="Electronics">
                <a href="shop_grid.html">MORE</a>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- Category Area Ends -->

    <!-- Footer Area Starts -->
    <footer class="footer-area footer-2">
      <div class="container">
        <div class="footer-menu pt-120">
          <div class="row">
            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
              <div class="footer-widget mb-30 mb-lg-0 pt-15">
                <div class="logo pb-30">
                  <!--<a href="index.php"><img src="img/logo/logo-white.png" alt="logo"></a>--> logo sekolah
                </div>
                <div class="footer-info">
                  <ul>
                    <li>Email: <span class="ml-5">sdh@gmail.com</span></li>
                    <li>Phone: <span class="ml-5">+62 812-3676-8045</span></li>
                  </ul>
                  <p class="pr-65">Subscribe to our newsleter and stay
                    up to date with latest offers and
                    upcoming trends.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom mt-80">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12 order-md-2 order-lg-1">
              <div class="copyright mt-15">
                <p>Copyright © 2020</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer Area Ends -->
    <!-- scripts -->

    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/vendor/jquery-mean-menu.min.js"></script>
    <script src="js/vendor/owl.carousel.min.js"></script>
    <script src="js/vendor/slick.min.js"></script>
    <script src="js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="js/vendor/wow-1.3.0.min.js"></script>
    <script src="js/vendor/isotope.min.js"></script>
    <script src="js/vendor/jquery.nice-number.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/scripts.js"></script>

</body>

</html>
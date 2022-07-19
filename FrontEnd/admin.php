<?php
session_start();
$uname = $_SESSION['uname'];
$conn = oci_connect('XE', 'XE', 'localhost/xe')
  or die(oci_error());

if (!$conn) {
  echo "not connected";
} else {
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="newcss.css"> -->

</head>

<body>



  <div class="everything">

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex justify-content-between">

        <div class="logo">
          <!-- <h1><a href="index.php"><span>e</span>Business</a></h1> -->
          <!-- Uncomment below if you prefer to use an image logo -->
          <div class="fullnavname">
            <a href="../index.php"><img src="assets/img/tcblogo-removebg-preview (1).png" alt="" class="img-fluid"><span class="navname">Trading Corporation of Bangladesh</span></a>
          </div>

          <div class="shortnavname">

            <a href="../index.php"><img src="assets/img/tcblogo-removebg-preview (1).png" alt="" class="img-fluid"><span class="navname shortnavname">TCB</span></a>
          </div>

        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto" href="../index.php">Home</a></li>
            <!-- <li><a class="nav-link scrollto active" href="">Admin</a></li> -->
            <li class="dropdown"><a href="#" class="active"><span><?php echo $uname ?></span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <!-- <li><a href="admin_profile.php">Profile</a></li> -->
                <li><a href="notification.php">Notification</a></li>
                <li><a href="log_out.php">Log out</a></li>
              </ul>
            </li>

          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->



    <main id="main" style="margin-top: 80px;" class="d-flex align-items-center">
    <?php
        // $sql = "select * from admin where username = '$uname' ";
        // $stid = oci_parse($conn, $sql);
        // $r = oci_execute($stid);
    ?>

      <div class="container features">

        <div class="row justify-content-center ">

          <div class="col-md-3 col-lg-3 ">
            <div class="card d-flex align-items-stretch outterround">
              <a href="storage.php" class="stretched-link"></a>
              <i class="bi bi-building custom-icon d-flex justify-content-center"></i>
              <div class="card_title d-flex justify-content-center">
                <p>Storage</p>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-lg-3 ">
            <div class="card d-flex align-items-stretch outterround">
              <a href="dealer_info.php" class="stretched-link"></a>
              <i class="bi bi-file-earmark-person custom-icon d-flex justify-content-center"></i>
              <div class="card_title d-flex justify-content-center">
                <p>Dealer Info</p>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-lg-3 ">
            <div class="card d-flex align-items-stretch outterround">
              <a href="customer_info.php" class="stretched-link"></a>
              <i class="bi bi-file-earmark-person custom-icon d-flex justify-content-center"></i>
              <div class="card_title d-flex justify-content-center">
                <p>Customer Info</p>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-lg-3 ">
            <div class="card d-flex align-items-stretch outterround">
              <a href="admin_package.php" class="stretched-link"></a>
              <i class="bi bi-box-seam custom-icon d-flex justify-content-center"></i>
              <div class="card_title d-flex justify-content-center">
                <p>Package</p>
              </div>
            </div>
          </div>

        </div>

        <div class="row justify-content-center">

          <div class="col-md-3 col-lg-3 ">
            <div class="card d-flex align-items-stretch outterround">
              <a href="adddealer.php" class="stretched-link"></a>
              <i class="bi bi-person-plus custom-icon d-flex justify-content-center"></i>
              <div class="card_title d-flex justify-content-center">
                <p>Add Dealer</p>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-lg-3 ">
            <div class="card d-flex align-items-stretch outterround">
              <a href="custverific.php" class="stretched-link"></a>
              <i class="bi bi-bag-plus custom-icon d-flex justify-content-center"></i>
              <div class="card_title d-flex justify-content-center">
                <p>Add Customer</p>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-lg-3 ">
            <div class="card d-flex align-items-stretch outterround">
              <a href="allocategoods.php" class="stretched-link"></a>
              <i class="bi bi-box-arrow-up-right custom-icon d-flex justify-content-center"></i>
              <div class="card_title d-flex justify-content-center">
                <p>Allocate Goods</p>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-lg-3 ">
            <div class="card d-flex align-items-stretch outterround">
              <a href="feedback.php" class="stretched-link"></a>
              <i class="bi bi-chat-dots custom-icon d-flex justify-content-center"></i>
              <div class="card_title d-flex justify-content-center">
                <p>Feedback</p>
              </div>
            </div>
          </div>

        </div>

      </div>

    </main><!-- End #main -->



    <!-- ======= Footer ======= -->
    <footer class="">
      <div class="footer-area-bottom">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="copyright text-center">
                <p>
                  &copy; Copyright <strong>Trading Corporation of Bangladesh</strong>. All Rights Reserved
                </p>
              </div>
              <div class="credits">

                Designed by <a href="https://Group-5.com/">Group-5</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer><!-- End  Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="newjs.js"></script>

  </div>

</body>

</html>
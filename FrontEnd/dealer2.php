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

  <title>Dealer</title>
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
            <!-- <li><a class="nav-link scrollto active" href=""><?php echo $uname ?></a></li> -->
            <li class="dropdown"><a href="#"><span><?php echo $uname ?></span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="dealer_profile.php">Profile</a></li>
                <!-- <li><a href="notification.html">Notification</a></li> -->
                <li><a href="log_out.php">Log out</a></li>
              </ul>
            </li>
            <!-- <li><a class="nav-link scrollto" href="">Notification</a></li> -->
            <!-- <li class="nav-item dropdown notification">
              <a class="nav-link nav-icons" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-bell d-flex justify-content-center"></i> <span class="indicator"></span></a>
              <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                <li>
                  <div class="notification-title"> Notification</div>
                  <div class="notification-list">
                    <div class="list-group">
                      <a href="#" class="list-group-item list-group-item-action">
                        <div class="notification-info">
                          <div class="notification-list-user-block"><span class="notification-list-user-name">Rice &
                              potato
                            </span>Request are sent.
                            <div class="notification-date">2 mins ago</div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="list-footer"> <a href="#">View all notifications</a></div>
                </li>
              </ul>
            </li> -->

          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </header><!-- End Header -->



    <main id="main" style="margin-top: 80px;" class="d-flex align-items-center">


      <div class="container features">

        <div class="row justify-content-center ">

          <div class="col-md-4 col-lg-4 ">
            <div class="card d-flex align-items-stretch outterround">
              <a href="dealer_inventory.php" class="stretched-link"></a>
              <i class="bi bi-bag custom-icon d-flex justify-content-center"></i>
              <div class="card_title d-flex justify-content-center">
                <p>Inventory Records</p>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-lg-4 ">
            <div class="card d-flex align-items-stretch outterround">
              <a href="dealer_inventory2.php" class="stretched-link"></a>
              <i class="bi bi-bag custom-icon d-flex justify-content-center"></i>
              <div class="card_title d-flex justify-content-center">
                <p>My Inventory</p>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-lg-4 ">
            <div class="card d-flex align-items-stretch outterround">
              <a href="dealer_customer2.php" class="stretched-link"></a>
              <i class="bi bi-file-earmark-person custom-icon d-flex justify-content-center"></i>
              <div class="card_title d-flex justify-content-center">
                <p>My Customers</p>
              </div>
            </div>
          </div>

        </div>

        <div class="row justify-content-center">

          <div class="col-md-4 col-lg-4 ">
            <div class="card d-flex align-items-stretch outterround">
              <a href="package_info.php" class="stretched-link"></a>
              <i class="bi bi-box-seam custom-icon d-flex justify-content-center"></i>
              <div class="card_title d-flex justify-content-center">
                <p>Package Info</p>
              </div>
            </div>
          </div>

          <!-- <div class="col-md-4 col-lg-4 ">
            <div class="card d-flex align-items-stretch outterround">
              <a href="Dealer_sell_Items.html" class="stretched-link"></a>
              <i class="bi bi-basket custom-icon d-flex justify-content-center"></i>
              <div class="card_title d-flex justify-content-center">
                <p>Sell Items</p>
              </div>
            </div>
          </div> -->

          <div class="col-md-4 col-lg-4  ">
            <div class="card d-flex align-items-stretch outterround">
              <a href="dealer_treasury.php" class="stretched-link"></a>
              <i class="bi bi-cash-coin custom-icon d-flex justify-content-center"></i>
              <div class="card_title d-flex justify-content-center">
                <p>Treasury</p>
              </div>
            </div>
          </div>
          
          <div class="col-md-4 ">
            <div class="card d-flex align-items-stretch outterround">
              <a href="Dealer_sell_Items.php" class="stretched-link"></a>
              <i class="bi bi-basket custom-icon d-flex justify-content-center"></i>
              <div class="card_title d-flex justify-content-center">
                <p>Sell Items</p>
              </div>
            </div>
          </div>

        </div>

        <div class="row justify-content-center">

         

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
                &copy; Copyright <strong>TCB BD </strong>. All Rights Reserved
              </p>
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
  <!-- <script src="newjs.js"></script> -->

  </div>

</body>

</html>
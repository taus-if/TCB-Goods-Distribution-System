<?php
session_start();
$uname = $_SESSION['uname']; //or 
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

    <title>Trading Corporation of Bangladesh</title>
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
                        <!-- <li><a class="nav-link scrollto active" href="admin.php">Admin</a></li> -->
                        <li class="dropdown"><a href="#"><span><?php echo $uname ?></span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <!-- <li><a href="admin_profile.php">Profile</a></li> -->
                                <!-- <li><a href="notification.php">Notification</a></li> -->
                                <li><a href="/logout">Log out</a></li>
                            </ul>
                        </li>

                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->



        <main id="main" style="margin-top: 80px;">
            <!-- ============================================================== -->
            <!-- wrapper  -->
            <!-- ============================================================== -->
            <div class="dashboard-wrapper">
                <div class="dashboard-ecommerce">
                    <div class="container-fluid dashboard-content ">

                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header">
                                    <h2 class="pageheader-title" style="text-align: center;">NOTIFICATION</h2>
                                    <div>
                                        <div class="page-breadcrumb">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="admin.php" class="breadcrumb-link">Admin</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">Notification</li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->

                        <div>
                            <section class="section-50">
                                <?php
                                $sql = "select * from dealer_inventory2 natural join dealer_info";
                                $stid = oci_parse($conn, $sql);
                                $r = oci_execute($stid);

                                while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                                    if ($row['QUANTITY'] < 50) {
                                        echo "<h6 class='text-center'> Dealer named " . $row['APPLICANT_NAME']. " of dealer_id " . $row['DEALER_ID'] . " has " . $row['ITEM_NAME'] . 
                                        " of quantity " . $row['QUANTITY'] . "  which is less than 50   <sub>" 
                                        . date("h:i:sa") . "</sub><br><br></h6>";
                                    }
                                }
                                ?>
                                <div class="text-center"> <a href="#" class="btn btn-success">Load more activity</a> </div>
                            </section>
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
                            <div class="credits">

                                Designed by <a href="">Rifat</a>
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
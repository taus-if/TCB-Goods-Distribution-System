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
                        <li class="dropdown"><a href="#"><span><?php echo $uname ?></span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="profile.html">Profile</a></li>
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
                                    <h2 class="pageheader-title" style="text-align: center;"><?php echo $uname . "'s PROFILE" ?></h2>
                                    <div>
                                        <div class="page-breadcrumb">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="admin.php" class="breadcrumb-link">Admin</a></li>
                                                    <!-- <li class="breadcrumb-item"><a href="dealer_info.php" class="breadcrumb-link">Dealer's Information</a></li> -->
                                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $uname . "'s profile" ?></li>
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



                        <!-- ============================================================== -->
                        <!-- Admin profile -->
                        <!-- ============================================================== -->

                        <section class="admin_p about-section gray-bg" id="about">
                            <div class="container">
                                <div class="row align-items-center flex-row-reverse">
                                    <div class="col-lg-6">
                                        <div class="about-text go-to">
                                            <h3 class="dark-color">About Me</h3>
                                            <h6 class="theme-color lead">A Lead UX &amp; UI designer based in Canada</h6>
                                            <p>I <mark>design and develop</mark> services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores. My passion is to design digital user experiences through the bold interface and meaningful interactions.</p>
                                            <div class="row about-list">
                                                <div class="col-md-6">
                                                    <div class="media">
                                                        <label>Birthday</label>
                                                        <p>4th april 1998</p>
                                                    </div>
                                                    <div class="media">
                                                        <label>Age</label>
                                                        <p>22 Yr</p>
                                                    </div>
                                                    <div class="media">
                                                        <label>Chember</label>
                                                        <p>Canada</p>
                                                    </div>
                                                    <div class="media">
                                                        <label>Address</label>
                                                        <p>California, USA</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="media">
                                                        <label>E-mail</label>
                                                        <p>info@domain.com</p>
                                                    </div>
                                                    <div class="media">
                                                        <label>Phone</label>
                                                        <p>820-885-3321</p>
                                                    </div>
                                                    <div class="media">
                                                        <label>Skype</label>
                                                        <p>skype.0404</p>
                                                    </div>
                                                    <div class="media">
                                                        <label>Freelance</label>
                                                        <p>Available</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="about-avatar">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="counter">
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <div class="count-data text-center">
                                                <h6 class="count h2" data-to="500" data-speed="500">500</h6>
                                                <p class="m-0px font-w-600">Total Dealers</p>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="count-data text-center">
                                                <h6 class="count h2" data-to="150" data-speed="150">150</h6>
                                                <p class="m-0px font-w-600">Total Customres</p>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="count-data text-center">
                                                <h6 class="count h2" data-to="850" data-speed="850">850</h6>
                                                <p class="m-0px font-w-600">No of Packages</p>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-3">
                                            <div class="count-data text-center">
                                                <h6 class="count h2" data-to="190" data-speed="190">190</h6>
                                                <p class="m-0px font-w-600">Total feedback</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb"></ol>
                            </nav>
                        </div>
                    </div>
                    <!-- ============================================================== -->
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
                                    &copy; Copyright <strong>TCB BD</strong>. All Rights Reserved
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
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

    <title>Dealer info</title>
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
                                <li><a href="notification.php">Notification</a></li>
                                <li><a href="/logout">Log out</a></li>
                            </ul>
                        </li>

                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
                <!-- .navbar -->
            </div>
        </header>
        <!-- End Header -->



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
                                    <h2 class="pageheader-title" style="text-align: center;">DEALER's INFORMATION</h2>
                                    <div>
                                        <div class="page-breadcrumb">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="admin.php" class="breadcrumb-link">Admin</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">Dealer's Information</li>
                                                </ol>
                                            </nav>
                                        </div>
                                        <div class="main-content container-fluid p-0" class="col-lg-12">
                                            <div class="search">
                                                <!-- <form method="post"> -->
                                                    <!-- <div class="input-group input-search">
                                                        <input class="form-control" type="search" id="res" name="res" placeholder="Search by any...">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-secondary" type="button"><i class="bi bi-search" style="color:#38CE24 ;"></i></button>
                                                        </span>
                                                    </div> -->
                                                <!-- </form> -->
                                                <form method="post" >
                                                    <input class="col-lg-11" type="text" name="search" placeholder="Search by any">
                                                    <input type="submit" name="submit">
                                                </form>

                                                <?php

                                                ?>
                                            </div>
                                        </div>
                                        <!-- <div class="input-group container-fluid p-0 col-lg-12">
                                            <div class="form-outline">
                                                <input id="search-input" type="search" id="form1" class="form-control" />
                                                <label class="form-label" for="form1">Search</label>
                                            </div>
                                            <button id="search-button" type="button" class="btn btn-primary">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->



                        <!-- ============================================================== -->
                        <!-- Result Table -->
                        <!-- ============================================================== -->

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Dealer Name</th>
                                    <th>Permanent Address</th>
                                    <th>Date of Birth</th>
                                    <th>Email</th> <!-- Mobile no <br> -->
                                    <th>Dealer ID </th><!-- <br>Password -->
                                    <th>Profile</th>
                                    <!-- <th>Organization name <br>Organization address <br>TIN number</th> -->
                                    <!-- <th></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST["submit"])) {

                                    $name = $_POST["search"];
                                    $result = "SELECT * FROM dealer_info WHERE applicant_name LIKE '%{$name}%' OR email LIKE '%{$name}%' 
                                                            OR dealer_id LIKE '%{$name}%' OR organization_name LIKE '%{$name}%' OR 
                                                            permanent_address LIKE '%{$name}%'  ";//and $uname=applicant_name

                                    $stidd = oci_parse($conn, $result);
                                    $rr = oci_execute($stidd);
                                    while ($row = oci_fetch_array($stidd, OCI_ASSOC + OCI_RETURN_NULLS)) {
                                        $unome=$row["DEALER_ID"];
                                        $_SESSION['aaa']=$unome;
                                        echo "<tr>
                                        <td>" . $row["APPLICANT_NAME"] . "</td>
                                        <td>" . $row["PERMANENT_ADDRESS"] . "</td>
                                        <td>" . $row["DATE_OF_BIRTH"] . "</td>
                                        <td>" . $row["EMAIL"] . "</td>
                                        <td>" . $row["DEALER_ID"] . "</td> 
                                        <td> <a href='admin_dealer_profile.php'> Profile </a> </td> 
                                        
                                    </tr>";
                                    }
                                    //$_GET['$row["APPLICANT_NAME"]']

                                    // while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                                    //     echo
                                    //     "<tr>
                                    //         <td>" . $row["APPLICANT_NAME"] . "</td>
                                    //         <td>" . $row["PERMANENT_ADDRESS"] . "</td>
                                    //         <td>" . $row["DATE_OF_BIRTH"] . "</td>
                                    //         <td>" . $row["EMAIL"] . "</td>
                                    //         <td>" . $row["DEALER_ID"] . "</td>  

                                    //     </tr>";
                                    // }
                                } else {
                                    $sql = "select * from  dealer_info, info where dealer_info.dealer_id=info.dealer_id  ";  //username = '$uname';
                                    $stid = oci_parse($conn, $sql);
                                    $r = oci_execute($stid);

                                    // <td>" . $row["organization_name"] . $row["organization_address"] . $row["tin_number"] . "</td>
                                    // <td>12/05/22</td>

                                    while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                                        $unome=$row["DEALER_ID"];
                                        $_SESSION['aaa']=$unome;
                                        echo
                                        "<tr>
                                            <td>" . $row["APPLICANT_NAME"] . "</td>
                                            <td>" . $row["PERMANENT_ADDRESS"] . "</td>
                                            <td>" . $row["DATE_OF_BIRTH"] . "</td>
                                            <td>" . $row["EMAIL"] . "</td>
                                            <td>" . $row["DEALER_ID"] . "</td>  
                                            <td> <a href='admin_dealer_profile.php'> Profile </a> </td>
                                            
                                        </tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>

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
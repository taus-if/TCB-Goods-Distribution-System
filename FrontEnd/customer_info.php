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

    <title>Customer info</title>
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
                                <!-- <li><a href="admin_profile.php">Profile</a></li> -->
                                <!-- <li><a href="admin.php">Admin Home</a></li> -->
                                <li><a href="log_out.php">Log out</a></li>
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
                                    <h2 class="pageheader-title" style="text-align: center;">CUSTOMER's INFORMATION</h2>
                                    <div>
                                        <div class="page-breadcrumb">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="admin.php" class="breadcrumb-link">Admin</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">Customer's Information</li>
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
                                                <!-- <form method="post">
                                                    <input class="col-lg-11" type="text" name="search" placeholder="Search by any">
                                                    <input type="submit" name="submit">
                                                </form> -->

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
                        <!-- search button  -->

                        <!-- by customer info  -->
                        <div class="text-center">
                            <form method="post">
                                <input class="col-md-4" type="text" name="search1" placeholder="Search by customer info">
                                <input class="" type="submit" name="submit">
                                <!-- btn btn-info -->
                            </form>

                            <!-- by dealer  -->

                            <form method="post">
                                <input class="col-md-4 " type="text" name="search6" placeholder="Search by Dealer">
                                <input class="" type="submit" name="submit2">
                                <!-- btn btn-success -->
                            </form>
                        </div>
                        <table class="table">

                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>Mobile no</th>
                                    <th>Date of Birth</th>
                                    <th>Income</th> <!-- Mobile no <br> -->
                                    <!-- <th>Dealer ID </th><br>Password -->
                                    <th>TCB card no</th>
                                    <th>Dealer name</th>
                                    <!-- <th>Organization name <br>Organization address <br>TIN number</th> -->
                                    <!-- <th></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST["submit"])) {

                                    $name = $_POST["search1"];
                                    $result = " SELECT customer_info.NAME, customer_info.MOBILE_NO, customer_info.DATE_OF_BIRTH,
                                                customer_info.INCOME, customer_info.TCB_CARD_NO, dealer_info.APPLICANT_NAME
                                                FROM customer_info , dealer_area, dealer_info 
                                                WHERE customer_info.area_code=dealer_area.area_code and dealer_area.dealer_id=dealer_info.dealer_id AND
                                                (customer_info.name LIKE '%{$name}%' OR customer_info.nid LIKE '%{$name}%' 
                                                OR customer_info.occupation LIKE '%{$name}%' OR customer_info.spouse LIKE '%{$name}%' OR 
                                                customer_info.mobile_no LIKE '%{$name}%' OR customer_info.tcb_card_no LIKE '%{$name}%' OR 
                                                customer_info.income LIKE '%{$name}%' OR  customer_info.no_of_family_members LIKE '%{$name}%' OR 
                                                customer_info.area_code LIKE '%{$name}%' OR customer_info.package_no LIKE '%{$name}%' OR
                                                customer_info.date_of_birth LIKE '%{$name}%' OR customer_info.age LIKE '%{$name}%' OR 
                                                customer_info.holding_no LIKE '%{$name}%' ) ";

                                    $stidd = oci_parse($conn, $result);
                                    $rr = oci_execute($stidd);
                                    while ($row = oci_fetch_array($stidd, OCI_ASSOC + OCI_RETURN_NULLS)) {
                                        echo "<tr>
                                        <td>" . $row["NAME"] . "</td>
                                        <td>" . $row["MOBILE_NO"] . "</td>
                                        <td>" . $row["DATE_OF_BIRTH"] . "</td>
                                        <td>" . $row["INCOME"] . "</td>
                                        <td>" . $row["TCB_CARD_NO"] . "</td>  
                                        <td>" . $row["APPLICANT_NAME"] . "</td> 
                                    </tr>";
                                    }

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
                                } elseif (isset($_POST["submit2"])) {
                                    $name = $_POST["search6"];
                                    $result = " SELECT customer_info.NAME, customer_info.MOBILE_NO, customer_info.DATE_OF_BIRTH,
                                                customer_info.INCOME, customer_info.TCB_CARD_NO, dealer_info.APPLICANT_NAME
                                                FROM customer_info , dealer_area, dealer_info 
                                                WHERE customer_info.area_code=dealer_area.area_code and dealer_area.dealer_id=dealer_info.dealer_id 
                                                and ( dealer_info.applicant_name LIKE '%{$name}%' OR dealer_info.dealer_id LIKE '%{$name}%' 
                                                OR dealer_info.organization_name LIKE '%{$name}%' OR dealer_info.email LIKE '%{$name}%' OR 
                                                dealer_info.tin_number LIKE '%{$name}%' ) ";

                                    $stidd = oci_parse($conn, $result);
                                    $rr = oci_execute($stidd);
                                    while ($row = oci_fetch_array($stidd, OCI_ASSOC + OCI_RETURN_NULLS)) {
                                        echo "<tr>
                                        <td>" . $row["NAME"] . "</td>
                                        <td>" . $row["MOBILE_NO"] . "</td>
                                        <td>" . $row["DATE_OF_BIRTH"] . "</td>
                                        <td>" . $row["INCOME"] . "</td>
                                        <td>" . $row["TCB_CARD_NO"] . "</td>
                                        <td>" . $row["APPLICANT_NAME"] . "</td>  
                                        
                                    </tr>";
                                    }

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
                                    $sql = "select * from customer_info  ";  //username = '$uname';
                                    $stid = oci_parse($conn, $sql);
                                    $r = oci_execute($stid);

                                    $row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
                                    while ($row < 10) {
                                        echo
                                        "<tr>
                                            <td>" . $row["NAME"] . "</td>
                                            <td>" . $row["MOBILE_NO"] . "</td>
                                            <td>" . $row["DATE_OF_BIRTH"] . "</td>
                                            <td>" . $row["INCOME"] . "</td>
                                            <td>" . $row["TCB_CARD_NO"] . "</td>  
                                        
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
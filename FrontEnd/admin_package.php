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
                                <!-- <li><a href="dealer_profile.php">Profile</a></li> -->
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
                                    <h2 class="pageheader-title" style="text-align: center;">About The Packages</h2>
                                    <div>
                                        <div class="page-breadcrumb">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="dealer2.php" class="breadcrumb-link">Dealer</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">Package Information</li>
                                                </ol>
                                                <!-- <div class="col-md-12 text-center">
                                                    <button type="button" class="btn btn-success" id="demo" onclick="myFunction()">Update package</button>
                                                </div> -->

                                            </nav>
                                        </div>

                                    </div>
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
                                <th>Items no</th>
                                <th>Item Name</th>
                                <th>Package 1</th>
                                <th>Package 2</th>
                                <th>Package 3</th>
                                <th>Unit</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "select * from package";
                            $stid = oci_parse($conn, $sql);
                            $r = oci_execute($stid);

                            while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                                echo "
                                <tr>
                                    <td>" . $row['SL_NO'] . "</td>
                                    <td>" . $row['ITEM_NAME'] . "</td>
                                    <td>" . $row['PK1'] . "</td>
                                    <td>" . $row['PK2'] . "</td>
                                    <td>" . $row['PK3'] . "</td>
                                    <td>" . $row['UNIT'] . "</td>
                                </tr>
                                ";
                            }
                            // $row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
                            // while($row['SL_NO']!=NULL)
                            // {

                            // }
                            ?>
                        </tbody>

                    </table>
                    <div class="text-center col-md-12">
                        <h2>Update Packages</h2>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="dest_from">From</label>
                            <span role="status" aria-live="polite" class="ui-helper-hidden-accessible">2 results are available, use up and down arrow keys to navigate.</span><input type="text" class="form-control jqchars  ui-autocomplete-input" id="dest_from" name="dest_from" placeholder="From Station" maxlength="15" value="" autocomplete="off">
                        </div>
                    </div> -->
                    <div class="container">
                        <div class="row">
                            <div class=" text-center">
                                <input type='text'>
                                <input type='text'>
                                <input type='text'>
                                <?php
                                // $sqql = "select * from package";
                                // $stiid = oci_parse($conn, $sqql);
                                // $ri = oci_execute($stiid);
                                //     while ($raw = oci_fetch_array($stiid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                                //         echo "
                                //         <tr>
                                //             <td>" . $raw['ITEM_NAME'] . "</td>
                                //             <input type='text'>
                                //             <td>" . $raw['UNIT'] . "</td>
                                //             <br>
                                //             </tr>";
                                //         }
                                ?>

                            </div>
                            <div class="col-md-12  text-center">
                                <!-- <button type="button" class="btn btn-primary">Cancel</button> -->
                                <button type="button" class="btn btn-warning ml-2" id="demo">Update</button> <!-- // onclick="myFunction()" -->
                            </div>
                        </div>
                    </div>


                    <!-- <ul class="form">
                        <li>
                            <input class="form-btn" type="button" name="name" value="Name">
                            <input class="hidden-form" type="text" name="nm">
                        </li>
                    </ul> -->


                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb"></ol>
                        </nav>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end Result Table -->
                    <!-- ============================================================== -->

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
        <!-- <script>
            function myFunction() {
                // document.getElementById("demo").style.color = "red";
                document.getElementById("demo").classList.toggle("show");
            }
        </script> -->
        <!-- <script>
            $('.form-btn').click(function() {
                $(this).next().toggleClass('show-form');
            });

            $('.form-btn').click(function() {
                $(this).next().toggleClass('show-form');
            });
            .form {
                float: left;
                list - style: none;
            }
            .hidden - form {
                visibility: hidden;
            }
            .show - form {
                visibility: visible!important;
            }
    </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

    </div>

</body>

</html>
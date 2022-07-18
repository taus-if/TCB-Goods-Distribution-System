<?php
session_start();
$uname = $_SESSION['uname']; //or 
$conn = oci_connect('XE', 'XE', 'localhost/xe')
    or die(oci_error());

if (!$conn) {
    echo "not connected";
} else {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["submit1"])) {

            $pack_no = $_POST["Pack_no"];
            $item_name = $_POST['item_name'];
            $amount = $_POST['amount'];
            echo $pack_no . $amount;
            if ($pack_no == 1) {
                $ssql = "UPDATE package
                             SET pk1 = '$amount'
                             WHERE item_name='$item_name' ";

                $sstid = oci_parse($conn, $ssql);
                oci_execute($sstid);
            } elseif ($pack_no == 2) {
                $ssql = "UPDATE package
                             SET pk2 = '$amount'
                             WHERE item_name='$item_name' ";

                $sstid = oci_parse($conn, $ssql);
                oci_execute($sstid);
            } elseif ($pack_no == 3) {
                $ssql = "   UPDATE package
                                SET pk3 = '$amount'
                                WHERE item_name='$item_name' ";

                $sstid = oci_parse($conn, $ssql);
                oci_execute($sstid);
            } else {
                "<script> alert('Your Package number is wrong');</script>";
            }
            // $ssql = "UPDATE package
            // SET pk$pack_no = $amount
            //     WHERE item_name='$item_name' ";

            // $sstid = oci_parse($conn, $ssql);
            // oci_execute($sstid);

            // unset($pack_no);
            // unset($item_name);
            // unset($amount);

            // $done = true;
            // header("Location: " . $_SERVER['PHP_SELF']);
            //  header("Location: admin_package.php");

            // exit;
        } elseif (isset($_POST["submit2"])) {

            // $pack_no = $_POST["Pack_no"];
            $item_name = $_POST['aitem_name'];
            $amount1 = $_POST['amount1'];
            $amount2 = $_POST['amount2'];
            $amount3 = $_POST['amount3'];
            $unit = $_POST['unit'];
            // if ($pack_no == 1) {
            $ssql = "insert into package(item_name, pk1, pk2, pk3, unit)
            values('$item_name', '$amount1', '$amount2', '$amount3', '$unit') ";

            $sstid = oci_parse($conn, $ssql);
            oci_execute($sstid);
            // } 

        } elseif (isset($_POST["submit3"])) {

            // $pack_no = $_POST["Pack_no"];
            $item_name = $_POST['ritem_name'];
            // if ($pack_no == 1) {
            $ssql = "DELETE FROM package
                     WHERE item_name='$item_name' ";

            $sstid = oci_parse($conn, $ssql);
            oci_execute($sstid);
            // } 

        } else {
            echo "<script> alert('No Submit Button Works');</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin package</title>
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
                        <li class="dropdown"><a href="#" class="active"><span><?php echo $uname ?></span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="notification.php">Notification</a></li>
                                <li><a href="log_out.php">Log out</a></li>
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
                                                    <li class="breadcrumb-item"><a href="admin.php" class="breadcrumb-link">Admin</a></li>
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
                                <!-- <th>Items no</th> -->
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
                        <h2>Update Amounts in Packages</h2>
                    </div>
                    <div class="container">
                        <div class="row">
                            <form method="post">
                                <div class=" text-center">
                                    <input class="" type='text' name="Pack_no" placeholder="Package no">
                                    <input type='text' name="item_name" placeholder="Item Name">
                                    <input type='text' name="amount" placeholder="Amount">
                                </div>
                                <div class="text-center" style="margin-top: 5px; margin-bottom:10px">
                                    <!-- <button type="button" class="btn btn-primary">Cancel</button> -->
                                    <input type="submit" class="btn btn-warning" name="submit1">
                                    <!--Update</button> // onclick="myFunction()" -->
                                </div>
                            </form>
                            <?php
                                // $pack_no = $_POST["Pack_no"];
                                // $item_name = $_POST['item_name'];
                                // $amount = $_POST['amount'];
                                // echo $pack_no . $amount;
                            ?>

                        </div>
                    </div>

                    <div class="text-center col-md-12">
                        <h2>Add Items </h2>
                    </div>
                    <div class="container">
                        <div class="row">
                            <form method="post">
                                <div class=" text-center">
                                    <!-- <input class="" type='text' name="Pack_no" placeholder="Package no"> -->
                                    <input type='text' name="aitem_name" placeholder="Item Name">
                                    <input type='text' name="amount1" placeholder="Amount in Package 1">
                                    <input type='text' name="amount2" placeholder="Amount in Package 2">
                                    <input type='text' name="amount3" placeholder="Amount in Package 3">
                                    <input type='text' name="unit" placeholder="Unit of Item">
                                </div>
                                <div class="text-center" style="margin-top: 5px; margin-bottom:10px">
                                    <!-- <button type="button" class="btn btn-primary">Cancel</button> -->
                                    <input type="submit" class="btn btn-info" name="submit2">
                                    <!--Update</button> // onclick="myFunction()" -->
                                </div>
                            </form>
                            <?php

                            ?>

                        </div>
                    </div>

                    <div class="text-center col-md-12">
                        <h2>Remove Items</h2>
                    </div>
                    <div class="container">
                        <div class="row">
                            <form method="post">
                                <div class=" text-center">
                                    <!-- <input class="" type='text' name="Pack_no" placeholder="Package no"> -->
                                    <input type='text' name="ritem_name" placeholder="Item Name to Remove">
                                    <!-- <input type='text' name="amount" placeholder="Amount"> -->
                                </div>
                                <div class="text-center" style="margin-top: 5px; margin-bottom:10px">
                                    <!-- <button type="button" class="btn btn-primary">Cancel</button> -->
                                    <input type="submit" class="btn btn-danger" name="submit3">
                                    <!--Update</button> // onclick="myFunction()" -->
                                </div>
                            </form>
                            <?php

                            ?>

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
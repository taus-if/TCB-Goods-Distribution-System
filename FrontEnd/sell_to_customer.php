<?php
    session_start();
    $wrongInfo = false;
    $uname = $_SESSION['uname'];
    $cust_id = $_SESSION['cust_id'];
    $pac_name = $_SESSION['pac_name'];
    $conn = oci_connect('XE', 'XE', 'localhost/xe')
    or die(oci_error());

    if(!$conn){
        echo "not connected";
    }else{
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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900"
        rel="stylesheet">

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
                        <a href="../index.php"><img src="assets/img/tcblogo-removebg-preview (1).png" alt=""
                                class="img-fluid"><span class="navname">Trading Corporation of Bangladesh</span></a>
                    </div>

                    <div class="shortnavname">

                        <a href="../index.php"><img src="assets/img/tcblogo-removebg-preview (1).png" alt=""
                                class="img-fluid"><span class="navname shortnavname">TCB</span></a>
                    </div>

                </div>

                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto" href="../index.php">Home</a></li>
                        <li class="dropdown"><a href="#"><span><?php echo $uname; ?></span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                              <li><a href="dealer_profile.php">Profile</a></li>
                              <li><a href="/logout">Log out</a></li>
                            </ul>
                          </li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
                <!-- navbar -->
            </div>
        </header>
        <!-- End Header -->



        <main id="main" style="margin-top: 80px; margin-left: 5%; margin-right: 5%;">
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
                                    <h2 class="pageheader-title" style="text-align: center;">ABOUT CUSTOMER</h2>
                                    <div>
                                        <!-- <div class="page-breadcrumb">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="dealer2.php" class="breadcrumb-link">Dealer</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">Selling Items
                                                    </li>
                                                </ol>
                                            </nav>
                                        </div>
                                        <div class="main-content container-fluid p-0" class="col-lg-12">
                                                <form method="post" >
                                                    <input class="col-lg-11" type="text" name="cust_id" placeholder="Search by any">
                                                    <button class="btn btn-success" name="submit" type="submit" value="submitval">Submit</button>
                                                </form>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>Package no </th>
                                    <th>Mobile no </th>
                                    <th>Last Received</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "select tcb_card_no, name, package_no, mobile_no, last_buy_date from customer_info where tcb_card_no ='$cust_id'";
                                    $stid = oci_parse($conn, $sql);
                                    $r = oci_execute($stid);
                                    while($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)){
                                        echo "
                                        <tr>
                                            <td>".$row["TCB_CARD_NO"]."</td>
                                            <td>".$row["NAME"]."</td>
                                            <td>".$row["PACKAGE_NO"]."</td>
                                            <td>".$row["MOBILE_NO"]."</td>
                                            <td>".$row["LAST_BUY_DATE"]."</td>
                                        </tr>
                                        ";
                                    }

                                ?>
                            </tbody>
                        </table>
                        <form method="post">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Items No</th>
                                        <th>Item Name</th>
                                        <!-- <th>Package 1</th> -->
                                        <th>Maximum amount</th>
                                        <!-- <th>Package 3</th> -->
                                        <th>Unit price (tk)</th>
                                        <th>Quntity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        error_reporting(E_ALL ^ E_WARNING);
                                        if($pac_name=='1'){
                                            $sql="select package.item_name, pk1, unit_price from package, goods where package.item_name=goods.item_name";
                                            $stid= oci_parse($conn, $sql);
                                            $r= oci_execute($stid);
                                            $sl_no=1;

                                            while($row=oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)){
                                                echo "
                                                <tr>
                                                    <td>".$sl_no."</td>
                                                    <td>".$row["ITEM_NAME"]."</td>
                                                    <td>".$row["PK1"]."</td>
                                                    <td>".$row["UNIT_PRICE"]."</td>
                                                    <td>
                                                    <input type='number' id='quantity".$sl_no."' name='quantity".$sl_no."' min='1' max='3'>
                                                    </td>
                                                </tr>
                                                ";
                                                $sl_no=$sl_no+1;
                                            }
                                            $sl_no=$sl_no-1;
                                            $GLOBALS['total_order']=$sl_no;
                                        }elseif($pac_name=='2'){
                                            $sql="select package.item_name, pk2, unit_price from package, goods where package.item_name=goods.item_name";
                                            $stid= oci_parse($conn, $sql);
                                            $r= oci_execute($stid);
                                            $sl_no=1;

                                            while($row=oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)){
                                                echo "
                                                <tr>
                                                    <td>".$sl_no."</td>
                                                    <td>".$row["ITEM_NAME"]."</td>
                                                    <td>".$row["PK2"]."</td>
                                                    <td>".$row["UNIT_PRICE"]."</td>
                                                    <td>
                                                    <input type='number' id='quantity".$sl_no."' name='quantity".$sl_no."' min='1' max='3'>
                                                    </td>
                                                </tr>
                                                ";
                                                $sl_no=$sl_no+1;
                                            }
                                            $sl_no=$sl_no-1;
                                            $GLOBALS['total_order']=$sl_no;
                                        }elseif($pac_name=='3'){
                                            $sql="select package.item_name, pk3, unit_price from package, goods where package.item_name=goods.item_name";
                                            $stid= oci_parse($conn, $sql);
                                            $r= oci_execute($stid);
                                            $sl_no=1;

                                            while($row=oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)){
                                                echo "
                                                <tr>
                                                    <td>".$sl_no."</td>
                                                    <td>".$row["ITEM_NAME"]."</td>
                                                    <td>".$row["PK3"]."</td>
                                                    <td>".$row["UNIT_PRICE"]."</td>
                                                    <td>
                                                    <input type='number' id='quantity".$sl_no."' name='quantity".$sl_no."' min='1' max='3'>
                                                    </td>
                                                </tr>
                                                ";
                                                $sl_no=$sl_no+1;
                                            }
                                            $sl_no=$sl_no-1;
                                            $GLOBALS['total_order']=$sl_no;
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="text-center"><button type="submit" class="btn btn-success" name="submit1" value="submit1val">Submit</button></div>
                        </form>

                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb"></ol>
                            </nav>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end Result Table -->
                        <!-- ============================================================== -->
                        <div class="col-md-12 text-center">
                            <!-- <button type="button" class="btn btn-danger" name="cancel">Cancel</button> -->
                            <?php
                                if($_SERVER['REQUEST_METHOD']=='POST'){
                                    if($_POST['submit1']=='submit1val'){
                                        $odr=$GLOBALS['total_order'];
                                        $orderarr=array($odr+10);
                                        for($x=1;$x<=$odr;$x++){
                                            $s="quantity".$x;
                                            $orderarr[$x]=$_POST[$s];
                                        }
                                        $sql="select package.item_name, pk3, unit_price from package, goods where package.item_name=goods.item_name";
                                        $stid= oci_parse($conn, $sql);
                                        $r= oci_execute($stid);
                                        $i=1;
                                        $total_price=0;
                                        $sql1="select * from dealer_inventory2 where dealer_id='$uname'";
                                        $stid1=oci_parse($conn, $sql1);
                                        $r1=oci_execute($stid1);
                                        while($row=oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)){
                                            $iname=$row['ITEM_NAME'];
                                            $uprice=$row['UNIT_PRICE'];
                                            $price=$uprice*$orderarr[$i];
                                            $i=$i+1;
                                            $total_price=$total_price+$price;
                                            // echo $total_price;
                                            // echo " ";
                                            $row1=oci_fetch_array($stid1, OCI_ASSOC+OCI_RETURN_NULLS);
                                            $row1['QUANTITY']=$row1['QUANTITY']-$orderarr[$i];
                                            $qn=$row1['QUANTITY'];
                                            $in=$row1['ITEM_NAME'];
                                            $di=$row1['DEALER_ID'];
                                            $sql2="update dealer_inventory2 set quantity='$qn' where item_name='$in' and dealer_id='$di'";
                                            $stid2=oci_parse($conn, $sql2);
                                            $r2=oci_execute($stid2);
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>

                    <!-- ============================================================== -->
                </div>
        </main><!-- End #main -->



        <!-- ======= Footer ======= -->
        <footer class="" style="margin-top:2%">
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
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

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
<?php
if (!isset($_SESSION)) {
    session_start();
}
$uname = $_SESSION['uname'];
$exist = false;

$conn = oci_connect('XE', 'XE', 'localhost/xe')
or die(oci_error());

if(!$conn){
  echo "not connected";
}else{
    if($_SERVER['REQUEST_METHOD']=='POST'){

        if($_POST['verificbtn']=='verifyval'){

            // $cust_nid = $_SESSION['cust_nid'];
            $nid = $_POST['cust_nid'];
            if(isset($nid) && $nid!=""){
            
                $sql = "select * from family_info where member_nid='$nid'";
                $stid=oci_parse($conn, $sql);
                oci_execute($stid); 
                $row= oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
                if($row == NULL)
                {
                    $_SESSION['cust_nid'] = $nid;
                    unset($nid);
                    header("Location: addcustomer.php");
                }
                else 
                {
                    $exist=true;
                }
                //exit;
            }
            else 
            {
                echo "<script> alert('Please Enter The NID Number');</script>";
            }
        
        }
    
    
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Customer Verification</title>
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

<body style="overflow:hidden;">
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
                    <li class="dropdown"><a href="#" class="active"><span><?php echo $uname ?></span> </span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                              <!-- <li><a href="admin_profile.php">Profile</a></li> -->
                              <li><a href="notification.php">Notification</a></li>
                              <li><a href="login.php">Log out</a></li>
                            </ul>
                          </li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->


    <form action="custverific.php" method="post" class="Rafatdealer row d-flex justify-content-center">


        <div class="col-sm-10 col-md-8 col-lg-6 outterround">

        <?php
        if($exist==true){
          echo "<p style='color:red'>This NID is already registered to a family...</p>";
        }
      ?>

            <div class="h1 d-flex justify-content-center" style="margin-bottom: 30px;">Verification</div>

            <div class="form-group w-70">
                <label for="exampleInputEmail1">NID Number</label>
                <input type="text" class="form-control" id="NIDZ" aria-describedby="emailHelp"
                    placeholder="Enter NID Number" name="cust_nid">

            </div>
            <div class="text-center"><button class="buttonn" type="submit" name="verificbtn" value="verifyval">Submit</button></div>

        </div>
        <!-- <script>
            function verify() {

                var nid = document.getElementById('NIDZ').value;
                //alert(nid);
                if (nid == '111') {
                    alert('Already Inserted');
                }
                else {

                    // <?php
                    // if (!isset($_SESSION)) {
                    //     session_start();
                    // }

                    // $_SESSION['cust_nid'] = "<script>document.write(nid)</script>";
                    // echo "<script> alert(nid); </script>"
                    // ?>

                    location.href = 'addcustomer.php';
                }
            }
        </script> -->
    </form>


    




    <footer class="fixed-bottom">
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

                            Designed by <a href="https://Group-5 /">Group-5 (14,31,32,34,36)</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End  Footer -->



    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>
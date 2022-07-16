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

  <title>Allocate Goods</title>
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
                <li><a href="notification.php">Notification</a></li>
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
                  <h2 class="pageheader-title" style="text-align: center;">ALLOCATE GOODS</h2>
                  <div>
                    <div class="page-breadcrumb">
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="admin.php" class="breadcrumb-link">Admin</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Allocate goods</li>
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
            <!-- Result Table -->
            <!-- ============================================================== -->

            <table class="table">
              <thead>
                <tr>
                  <th>dealer Id</th>
                  <th>dealer Name</th>
                  <th>Item Name</th>
                  <th>Quantity</th>
                   
                  <!--              <th>Package 3</th>
                                <th>Unit</th>
                                <th></th> -->
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "select * from dealer_inventory2 natural join dealer_info";
                $stid = oci_parse($conn, $sql);
                $r = oci_execute($stid);

                while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                  if($row['QUANTITY']<50){
                  echo "
                                <tr>
                                    <td>" . $row['DEALER_ID'] . "</td>
                                    <td>" . $row['APPLICANT_NAME']. "</td>
                                    <td>" . $row['ITEM_NAME'] . "</td>
                                    <td>" . $row['QUANTITY'] . "</td>
                                </tr> ";
                }}
                // $row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
                // while($row['SL_NO']!=NULL)
                // {
                // <td>" . $row['PK2'] . "</td>
                // <td>" . $row['PK3'] . "</td>                                    
                // <td>" . $row['UNIT'] . "</td>                                    
                // }
                ?>
              </tbody>

            </table>

            <div class="text-center col-md-12">
                        <h2>Allocate Goods to Dealers</h2>
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
                                <input class="" type='text' name="deal_id" placeholder="Dealer ID">
                                <input type='text' name="item_name" placeholder="Item Name">
                                <input type='text' name="amount" placeholder="Amount to ADD">

                            </div>
                            <div class="text-center" style="margin-top: 5px;">
                                <!-- <button type="button" class="btn btn-primary">Cancel</button> -->
                                <input type="submit" class="btn btn-warning" name="submit">
                                <!--Update</button> // onclick="myFunction()" -->
                            </div>
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

                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if (isset($_POST["submit"])) {

                                    $pack_no = $_POST["deal_id"];
                                    $item_name = $_POST['item_name'];
                                    $amount = $_POST['amount'];

                                    $col = "pk" . $pack_no;
                                    // echo $col;
                                    $ssql = "UPDATE dealer_inventory2
                                    SET quantity = ($amount + quantity)
                                        WHERE item_name='$item_name' ";

                                    $sstid = oci_parse($conn, $ssql);
                                    oci_execute($sstid);

                                    // unset($pack_no);
                                    // unset($item_name);
                                    // unset($amount);

                                    // $done = true;
                                    // header("Location: " . $_SERVER['PHP_SELF']);
                                    //  header("Location: admin_package.php");

                                    // exit;
                                }
                            }
                            ?>

                        </div>
                    </div>

            <!-- <table class="table">
              <thead>
                <tr>
                  <th>Edit</th>
                  <th>Dealer ID</th>
                  <th>Dealer Name</th>
                  <th>Unit</th>
                  <th>Capacity</th>
                  <th>Available</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td data-label="edit"><button type="button" onclick="adreto()">Login</button></td>
                  <td data-label="Pers No">dealer_01</td>
                  <td data-label="Name">Rafat</td>
                  <td data-label="Unit">Kg</td>
                  <td data-label="Prac">50</td>
                  <td data-label="Hit" id="av1">46</td>
                  
                </tr>

                <tr>
                  <td data-label="edit"><button type="button">Login</button></td>
                  <td data-label="Pers No">dealer_02</td>
                  <td data-label="Name">Nizami</td>
                  <td data-label="Unit">Kg</td>
                  <td data-label="Prac">50</td>
                  <td data-label="Hit">40</td>
                  
                </tr>

                <tr>
                  <td data-label="edit"><button type="button">Login</button></td>
                  <td data-label="Pers No">dealer_03</td>
                  <td data-label="Name">Tausif </td>
                  <td data-label="Unit">Litre</td>
                  <td data-label="Prac">15</td>
                  <td data-label="Hit">5</td>
                  
                </tr>
                <tr>
                  <td data-label="edit"><button type="button">Login</button></td>
                  <td data-label="Pers No">dealer_04</td>
                  <td data-label="Name">Rifat</td>
                  <td data-label="Unit">Kg </td>
                  <td data-label="Prac">30</td>
                  <td data-label="Hit">25</td>
                  
                </tr>

                <tr>
                  <td data-label="edit"><button type="button">Login</button></td>
                  <td data-label="Pers No">dealer_05</td>
                  <td data-label="Name">Navidul</td>
                  <td data-label="Unit">kg </td>
                  <td data-label="Prac">50</td>
                  <td data-label="Hit">40</td>
                  
                </tr>
                <script>
                  function adreto() {
                    var x = prompt("Enter ammount");
                    var y = document.getElementById("av1");
                    var num1 = parseFloat(x);
                    var num2 = parseFloat(y);
                    if (num1 >= '1' && num1 <= num2) {
                      alert("success");
                    } else {
                      alert("failure");
                    }
                  }
                </script>


              </tbody>


            </table> -->

            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb"></ol>
              </nav>
            </div>
            <!-- ============================================================== -->
            <!-- end Result Table -->
            <!-- ============================================================== -->



            <!-- ============================================================== -->
            <!-- Result Table -->
            <!-- ============================================================== -->

            <!-- <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Date</a></li>
                    <li class="breadcrumb-item active" aria-current="page">12 MAY 2022</li>
                  </ol>
                </nav>
              </div>

              <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Firing Officer</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Maj Noman, 4 BIR</li>
                  </ol>
                </nav>
              </div>


              <table class="table">
                <thead>
                  <tr>
                    <th>Pers No</th>
                    <th>Unit</th>
                    <th>Name</th>
                    <th>Prac</th>
                    <th>Hit</th>
                    <th>Missed</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-label="Pers No">BA-10964</td>
                    <td data-label="Unit">14 EB</td>
                    <td data-label="Name">Lt Hasan</td>
                    <td data-label="Prac">50</td>
                    <td data-label="Hit">46</td>
                    <td data-label="Missed">4</td>
                  </tr>

                  <tr>
                    <td data-label="Pers No">BA-10888</td>
                    <td data-label="Unit">4 BIR</td>
                    <td data-label="Name">Lt Anidro</td>
                    <td data-label="Prac">50</td>
                    <td data-label="Hit">40</td>
                    <td data-label="Missed">10</td>
                  </tr>

                  <tr>
                    <td data-label="Pers No">BA-10985</td>
                    <td data-label="Unit">9 Sigs</td>
                    <td data-label="Name">Lt Sabit</td>
                    <td data-label="Prac">50</td>
                    <td data-label="Hit">35</td>
                    <td data-label="Missed">15</td>
                  </tr>
                  <tr>
                    <td data-label="Pers No">BA-10964</td>
                    <td data-label="Unit">14 EB</td>
                    <td data-label="Name">Lt Hasan</td>
                    <td data-label="Prac">50</td>
                    <td data-label="Hit">46</td>
                    <td data-label="Missed">4</td>
                  </tr>

                  <tr>
                    <td data-label="Pers No">BA-10888</td>
                    <td data-label="Unit">4 BIR</td>
                    <td data-label="Name">Lt Anidro</td>
                    <td data-label="Prac">50</td>
                    <td data-label="Hit">40</td>
                    <td data-label="Missed">10</td>
                  </tr>

                  <tr>
                    <td data-label="Pers No">BA-10985</td>
                    <td data-label="Unit">9 Sigs</td>
                    <td data-label="Name">Lt Sabit</td>
                    <td data-label="Prac">50</td>
                    <td data-label="Hit">35</td>
                    <td data-label="Missed">15</td>
                  </tr>

                </tbody>

              </table>

              <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb"></ol>
                </nav>
              </div> -->
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

  </div>

</body>

</html>
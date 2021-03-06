<?php
session_start();

    $uname = $_SESSION['uname'];
    $conn = oci_connect('XE', 'XE', 'localhost/xe')
    or die(oci_error());

if (!$conn) {
    echo "not connected";
} else {
    $sql = "select * from main_inventory";
    $stid = oci_parse($conn, $sql);
    $r = oci_execute($stid);

                  if($_SERVER['REQUEST_METHOD']=='POST'){

                    if($_POST['addbtn']=='addval'){
                      $amount=(int) ($_POST['amount']);
                      $item=$_POST['product'];
                      if($item!="nai"){
                      $sql1 = "update main_inventory set QUANTITY=(QUANTITY+$amount) where lower(ITEM_NAME)=lower('$item')";
                      $stid1=oci_parse($conn, $sql1);
                      oci_execute($stid1);
                      $sql = "update main_inventory set date_added = sysdate where lower(ITEM_NAME)=lower('$item')";
                      $stid1=oci_parse($conn, $sql);
                      oci_execute($stid1);
                      }
                      header("Refresh:0");
                    }
                  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin Storage</title>
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
                        <!-- <li><a class="nav-link scrollto active" href="admin.php">Admin</a></li> -->
                        <li class="dropdown"><a href="#" class="active"><span><?php echo $uname ?></span> <i class="bi bi-chevron-down"></i></a>
                          <ul>
                            <li><a href="admin_profile.php">Profile</a></li>
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

            <!-- <h3 class="i-name">My Inventory</h3>
      <div class="values">
        <div class="val-box">
          <i class="bi bi-people"></i>
          <div>
            <h3>1111</h3>
            <span>Users</span>
          </div>
        </div>
        <div class="val-box">
          <i class="bi bi-people"></i>
          <div>
            <h3>1111</h3>
            <span>Users</span>
          </div>
        </div>
        <div class="val-box">
          <i class="bi bi-people"></i>
          <div>
            <h3>1111</h3>
            <span>Users</span>
          </div>
        </div>
        <div class="val-box">
          <i class="bi bi-people"></i>
          <div>
            <h3>1111</h3>
            <span>Users</span>
          </div>
        </div> 
        <div class="board">
          <table>
            <thead>
              <tr>
                <td>Name</td>
                <td>Title</td>
                <td>Status</td>
                <td>Role</td>
                <td></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                
              </tr>
            </tbody>
          </table>
        </div> -->
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
                                    <h2 class="pageheader-title" style="text-align: center;">STORAGE</h2>
                                    <div>
                                        <div class="page-breadcrumb">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="admin.php"
                                                            class="breadcrumb-link">Admin</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">Storage</li>
                                                </ol>
                                            </nav>
                                        </div>
                                        <!-- <div class="main-content container-fluid p-0" class="col-lg-12">
                        <div class="email-search">
                          <div class="input-group input-search">
                            <input class="form-control" type="text" placeholder="Search in Result Register..."><span
                              class="input-group-btn">
                              <button class="btn btn-secondary" type="button"><i
                                  class="bi bi-search"></i></button></span>
                          </div>
                        </div>
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

                        <!-- <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Date</a></li>
                    <li class="breadcrumb-item active" aria-current="page">04 MAY 2022</li>
                  </ol>
                </nav>
              </div>

              <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Firing Officer</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Maj Asif, 14 EB</li>
                  </ol>
                </nav>
              </div> -->


                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item no</th>
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Date Added</th>
                                    <th>username</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $i=0;
                              while($raw = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)){
                              ?>
                                <tr>
                                    <td data-label="Pers No"><?php echo $i+1 ?></td>
                                    <td data-label="Pers No"><?php echo $raw[ 'ITEM_NAME' ] ?></td>
                                    <td data-label="Name"><?php echo $raw[ 'QUANTITY' ] ?></td>
                                    <td data-label="Unit"><?php echo $raw[ 'DATE_ADDED' ] ?></td>
                                    <td data-label="Prac"><?php echo $raw[ 'USERNAME' ] ?></td>
                                    
                                </tr>
                                
                              <?php
                              $i++;
                              }
                              ?>
                            </tbody>

                        </table>

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
                <div class="container">
                  <div class="row">
                        <form action="storage.php" method="post" class="php-email-form">
                <div class="form-group">
                                  <select class="form-select" aria-label="Default select example" name="product">
                                  <option selected value="nai">Select Item Name</option>
                                  <?php
                                  $sql = "select * from package";
                                  $stid=oci_parse($conn, $sql);
                                  oci_execute($stid);
                                  while($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))
                                  {
                                    $prod = $row['ITEM_NAME'];
                                    $prodlower = strtolower($prod);
                                    echo "<option value='$prodlower'>$prod</option>";
                                  }
                                  ?>
                                  <!-- <option value="rice">Rice</option>
                                  <option value="sugar">Sugar</option>
                                  <option value="lentil">Lentil</option>
                                  <option value="soyabin oil">Soyabin Oil</option>
                                  <option value="onion">Onion</option>
                                  <option value="potato">Potato</option> -->
                                  </select>
                  <!-- <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter amount"> -->
                </div>
                <div class="form-group mt-3">
                  <!-- <input type="text" class="form-control" name="product" id="product" placeholder="Enter Product"> -->
                  <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter amount">
                </div>
                
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit" name="addbtn" type="submit" value="addval">Add</button></div>
                
              </form>
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
        <script src="newjs.js"></script>

    </div>

</body>

</html>
<?php
  session_start();
  $wrongInfo = false;
  $conn = oci_connect('XE', 'XE', 'localhost/xe')
  or die(oci_error());

  if(!$conn){
    echo "not connected";
  }else{
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $_SESSION['uname']= $username;
      $_SESSION['profile'] = $username;      
      $sql = "select * from dealer_info natural join info where dealer_id='$username' and password='$password'";
      $stid=oci_parse($conn, $sql);
      $r=oci_execute($stid);
      $row= oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
      if($row==NULL){
        $sql = "select * from admin where username= '$username' and password= '$password'";
        $stid=oci_parse($conn, $sql);
        $r=oci_execute($stid);
        $row= oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
        if($row!=NULL){
          header("Location: admin.php");
        }else{
          $wrongInfo=true;
        }
      }else{
        header("Location: dealer2.php");
      }
    }
    echo 'nai';
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
            <li><a class="nav-link scrollto active" href="">Login</a></li>

          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div>
    </header><!-- End Header -->

    <!-- ======= hero Section ======= -->
    </section><!-- End Hero Section -->

    <main id="main-login" class="d-flex align-items-center">

      <div class="container login-box">

      <?php
        if($wrongInfo==true){
          echo "<p style='color:red'> Wrong Info</p>";
        }
      ?>

        <div class="login-title h1 d-flex justify-content-center" style="margin-bottom: 30px;">Login</div>

        <!-- <div class="d-flex justify-content-around">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="logintype" id="inlineRadio1" value="Admin">
            <label class="form-check-label" for="inlineRadio1">Admin</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="logintype" id="inlineRadio2" value="Dealer">
            <label class="form-check-label" for="inlineRadio2">Dealer</label>
          </div>
        </div> -->

        <form action="login.php" method="post" class="Rafat">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Username" name="username" aria-describedby="emailHelp" required>
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="pass" placeholder="Password" name="password" required>
          </div>
          <!-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
          <!-- <button type="submit" class="btn btn-primary">Login</button> -->

          <div class="text-center"><button type="submit" class="btn btn-primary btn-block">Login</button></div>

          <!-- <a href="admin.php"> Admin login</a> -->

          <script>
            // function login() {
            //   var name = document.getElementById('username').value;
            //   var pass = document.getElementById('pass').value;
            //   //var option = document.getElementById('logintype').options[document.getElementById('logintype').selectedIndex].text;
            //   var option = document.querySelector('input[name="logintype"]:checked').value;
            //   //alert(option);

            //   //alert(option);

            //   if (option == 'Choose Login Type') {
            //     alert('Please choose login type');
            //   }
            //   else {

            //     if (name == 'admin' && pass == 'admin' && option == 'Admin') {
            //       location.href = 'admin.php';
            //     }
            //     else if (name == 'dealer' && pass == 'dealer' && option == 'Dealer') {
            //       location.href = 'dealer2.php';
            //     }
            //     else {
            //       alert('Username or Password is wrong')
            //     }
            //   }
            // }
          </script>


        </form>

      </div>


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
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
                Designed by <a href=""> Group-5 (14,31,32,34,36)</a>
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
  </div>

</body>

</html>
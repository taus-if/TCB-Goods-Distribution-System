<?php
session_start();
$uname = $_SESSION['uname'];
$conn = oci_connect('XE', 'XE', 'localhost/xe')
  or die(oci_error());

if (!$conn) {
  echo "not connected";
} else {
    $name = $_GET["name"];
    $dealer_id = $_GET["id"];
    $dealer = "select dealer_info.email,customer_info.mobile_no,customer_info.nid from customer_info natural join distribution_area natural join dealer_area natural join dealer_info 
                where customer_info.name = $name and dealer_info.dealer_id = $dealer_id";
    
    $stidd = oci_parse($conn, $dealer);
    $rr = oci_execute($stidd);
    $items = "select item_name,totalspent,last_buy_date,amount from customer_expenditure where nid = $dealer.nid";
    $stid = oci_parse($conn, $items);
    $r = oci_execute($stid);
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



    <!-- For Date picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker").datepicker();
        });
    </script>
    <!-- Date picker end -->

    <style>
      p{
        margin: 0;
      }

      .page{
        background: rgb(245, 240, 240);
        display: block;
        margin: 7rem auto 3rem auto;
        box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        position: relative;
      }

      .page[size="a4"]{
        width: 21cm;
        height: 29.7cm;
        overflow-x: hidden;
      }

      .contact-content {
        padding: 0;
        background: none;
      }

      .top-section{
        color: #fff;
        padding: 20px;
        height: 135px;
        background-color: #38CE24;
      }

      .top-section .contact,
      .top-section .address{
        width: 50%;
        height: 100%;
        float: left;
      }

      .top-section .address-content{
        max-width: 275px;
      }

      .top-section h2{
        color: #fff;
        font-size: 42px;
        margin-bottom: 10px;
        font-weight: 400;
      }

      .contact .contact-content{
        max-width: 220px;
        float: right;
        margin-top: 32px;
      }

      .contact-content .email,
      .contact-content .number{
        display: block;
      }

      /* Billing Invoice */

      .billing-invoice{
        padding: 20px;
        font-size: 20px;
        margin-bottom: 15px;
      }

      .billing-invoice .title{
        display: inline-block;
      }

      .billing-invoice .des{
        font-weight: 400;
        float: right;
      }

      .billing-invoice .code{
        font-weight: 700;
        text-align: right;
        margin-bottom: 0;
      }

      .billing-invoice .issue{
        font-size: 15px;
        text-align: right;
        margin-bottom: 0; 
      }

      /* Billed to  */

      .billing-to{
        padding: 20px;
        margin-top: 40px;
      }

      .billing-to .title{
        font-weight: 400;
        font-size: 20px;
        margin-bottom: 7px;
      }

      .billing-to .billed-sec{
        width: 50%;
        /* float: left; */
        font-size: 18px;
        margin-bottom: 25px;
      }

      .billing-to .name,
      .billing-to .sub-title{
        font-weight: 400;
        font-size: 18px;
        margin-bottom: 5px;
      }
      
      /* Invoice Table */

      .table{
        padding: 0px 20px;
      }

      .table table{
        width: 100%;
      }

      .table table th,td{
        padding: 5px;
        text-align: left;
        border-width: 2px;
        width: 300px;
      }

      /* Bottom Section */

      .bottom-section{
        margin-top: 15px;
        padding: 20px;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
      }

      .bottom-section .status-content h4{
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 10px;
      }

      .bottom-section .status.free::before,
      .bottom-section .status.paid::before{
        padding: 5px 10px;
        border-radius: 5px;
        margin-bottom: 8px;
        display: inline-block;
        text-transform: uppercase;
      }

      .bottom-section .status.free::before{
        content: "Unpaid";
        background-color: #ef7c94;
      }

      .bottom-section .status.paid::before{
        content: "Paid";
        background-color: #b142e7;
      }

      .bottom-section .tnx{
        text-align: center;
        margin-top: 10px;
      }

    </style>

</head>

<body>

    <div class="everything">
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
        
        <!-- Receipt Part -->

        <div class="page" size="a4">

          <!-- Top Section -->
           <div class="top-section">
            <div class="address">
              <div class="address-content">
                <h2>TCB - </h2>
              </div>
              <p>Tranding Corporation of Bangladesh</p>
            </div>

            <div class="contact">
              <div class="contact-content">
                <div class="email">
                  <?php
                    
                    echo $dealer->email;

                   ?>
                </div>
              </div>
             </div>
           </div>

           <!-- Invoice Ingo -->
           <div class="billing-invoice">

            <div class="title">
              Billing Invoice
            </div>

            <div class="des">

              <p class="issue">Issued : <?php echo $items-> last_buy_date?></p>

            </div>

           </div>

           <!-- Billed to -->
           <div class="billing-to">

            <div class="title">
             Billed To
            </div>
            
            <div class="billed-sec">
              <div class="name">
              <?php echo $name?>
              </div>
              <p><?php echo $dealer-> mobile_no ?></p>
              
            </div>

            <div class="billing-sec">
              <div class="sub-title">
                
              </div>
              <div class="ship-add">
                
              </div>

           </div>

           
          </div>

          <!-- Invoice Table -->

          <div class="table">
          <table>
            <tr>
              <th>#</th>
              <th>Product Name</th>
              <th>Qty</th>
              <th>Unit Price </th>
              <th>Total</th>
            </tr>
            <?php
                                    while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                                      $n = 1;
                                        echo "<tr>
                                        <td>" . $n . "</td>
                                        <td>" . $row["item_name"] . "</td>
                                        <td>" . $row["amount"] . "</td>
                                        <td>" . $row["totalspent"] . "</td>
                                        </tr>";
                                      $n = $n + 1;
                                    }
            ?>
            
          </table>
          </div>

          <!-- Bottom Section -->

          <div class="bottom-section">
            <div class="status-content">
              <h4>Payment Status</h4>
              <p class="status free"></p>
              <p>Payment Method : <span>SSL Commerz</span></p>
              <p class="tnx">Thanks for Shopping</p>
            </div>
          </div>

        </div>

        <!-- Footer -->

        <footer class="">
          <div class="footer-area-bottom">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="copyright text-center">
                              <p>
                                  &copy; Copyright <strong>Trading Corporation of Bangladesh</strong>. All Rights
                                  Reserved
                              </p>
                          </div>
                          <div class="credits">

                              Designed by <a href="https://Group-5 /">Navidul</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </footer><!-- End  Footer -->

    </div>
</body>
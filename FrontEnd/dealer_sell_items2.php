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

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Trading Corporation of Bangladesh</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
      nav img{
        width: 70px;
      }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="../index.php"> <img src="assets/img/tcblogo-removebg-preview (1).png" alt="" class="img-fluid"> </a>
    <a class="navbar-brand" href="#">Trading Corporation of Bangladesh</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse float-end" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $uname ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="log_out.php">Log Out</a>
        </li>
      </ul>
      <!-- <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> -->
    </div>
  </nav>

  <main>
    <div class="container">
      <h1 class="text-center">Customers under me</h1>
    </div>
    <div class="container my-4">
    <table class="table" id="myTable">
    <thead>
      <tr>
        <th scope="col">Customer ID</th>
        <th scope="col">Customer Name</th>
        <th scope="col">Package No</th>
        <th scope="col">Mobile No</th>
        <th scope="col">Last Recieved</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $sql = "select * from customer_info where area_code = (select area_code from dealer_area where dealer_id = '$uname')";
      $stid = oci_parse($conn, $sql);
      $r = oci_execute($stid);

      while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
        echo "
        <tr>
          <td>" . $row["TCB_CARD_NO"] . "</td>
          <td>" . $row["NAME"] . "</td>
          <td>" . $row["PACKAGE_NO"] . "</td>
          <td>" . $row["MOBILE_NO"] . "</td>
          <td>12/05/22</td>
        </tr>
        ";
      }
      ?>
    </tbody>
  </table>
    </div>
  </main>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
  </body>
</html>
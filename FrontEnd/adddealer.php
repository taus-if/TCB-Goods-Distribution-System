<?php
if (!isset($_SESSION)) {
    session_start();
}
$uname = $_SESSION['uname'];
$done = false;
$conn = oci_connect('XE', 'XE', 'localhost/xe')
or die(oci_error());

if(!$conn){
  echo "not connected";
}else{
    if($_SERVER['REQUEST_METHOD']=='POST'){

        if($_POST['submitbtn']=='submitval'){

            $deal_name = $_POST['deal-name'];
            $deal_add = $_POST['deal-add'];
            $deal_email = $_POST['deal-email'];
            $deal_tin = $_POST['deal-tin'];
            $deal_dob = $_POST['deal-dob'];

            $deal_ogname = $_POST['deal-og-name'];

            $deal_ogadd = $_POST['deal-og-add'];
            $deal_pass = $_POST['deal-password'];
            
            $area_num = (int)($_POST['deal-area-num']);

            $sqlgetseq = "select dealer_id_seq.nextval from dual";
            $stid = oci_parse($conn, $sqlgetseq);
            oci_execute($stid);
            $row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);

            $dealerid = $row["NEXTVAL"];

            $arrAreacode = array();

            for($i = 1; $i<=$area_num; $i++)
            {
                $arc = $_POST['deal-area-'.$i];
                array_push($arrAreacode,$arc);
            }


            $sql = "insert into dealer_info(dealer_id, organization_name, organization_address, applicant_name, permanent_address, email, tin_number, date_of_birth)
            values(concat('D',lpad($dealerid,5,'0')), '$deal_ogname', '$deal_ogadd', '$deal_name', '$deal_add', '$deal_email', '$deal_tin', to_date('$deal_dob', 'mm/dd/yyyy'))";



            $stid=oci_parse($conn, $sql);
            oci_execute($stid); 

            $sql3 = "insert into info(dealer_id, password) values(concat('D',lpad($dealerid,5,'0')), '$deal_pass')" ;
            $stid=oci_parse($conn, $sql3);
            oci_execute($stid); 

            for($i=1;$i<=$area_num;$i++)
            {
                $ind = $i -1 ;
                $sql2 = "insert into dealer_area(area_code, dealer_id) values('$arrAreacode[$ind]', concat('D',lpad($dealerid,5,'0')))";
                $stid=oci_parse($conn, $sql2);
                oci_execute($stid); 
            }

                unset($deal_name);
                unset($deal_add);
                unset($deal_ogname);
                unset($deal_ogadd);
                unset($deal_email);
                unset($deal_tin);
                unset($deal_dob);
                unset($deal_pass);
                unset($area_num);
                unset($dealerid);

                $done= true;
                //header("Location: ".$_SERVER['PHP_SELF']);
                header("Location: admin.php");

                exit;
        
        }    
    
    }
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



</head>

<body>

    <div class="everything">
        <header id="header" class="fixed-top d-flex align-items-center">
            <div class="container d-flex justify-content-between">

                <div class="logo">
                    
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
                        <!-- <li><a class="nav-link scrollto active" href="">Admin</a></li> -->
                        <li class="dropdown"><a href="#" class="active"><span><?php echo $uname ?></span> </span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                              <!-- <li><a href="admin_profile.php">Profile</a></li> -->
                              <li><a href="notification.html">Notification</a></li>
                              <li><a href="login.php">Log out</a></li>
                            </ul>
                          </li>

                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->


        <form action= "adddealer.php" method="post" class="Rafatdealer row d-flex justify-content-center">


            <div class="col-sm-10 col-md-8 col-lg-6 outterround">

                <div class="h1 d-flex justify-content-center" style="margin-bottom: 30px;">Dealer Information</div>


                <div class="form-group w-70">
                    <label for="exampleInputEmail1">Applicant Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Applicant Name" name="deal-name" required>

                </div>

                <div class="form-group w-70 mt-3">
                    <label for="exampleInputEmail1">Applicant Address</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Applicant Address" name="deal-add" required>

                </div>

                <div class="form-group w-70 mt-3">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Email Address" name="deal-email" required>

                </div>

                <div class="form-group w-70 mt-3">
                    <label for="exampleInputEmail1">TIN Number</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter TIN Number" name="deal-tin" required>

                </div>

                <div class="form-group w-70 mt-3">
                    <label for="datepicker">Date of Birth</label>
                    <input type="text" id="datepicker" class="form-control" placeholder="Enter Date of Birth" name="deal-dob" required>
                </div>

                <div class="form-group w-70 mt-3">
                    <label for="exampleInputEmail1">Organization Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Organization Name" name="deal-og-name" required>

                </div>

                <div class="form-group w-70 mt-3">
                    <label for="exampleInputEmail1">Organization Address</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Organization Address" name="deal-og-add" required>

                </div>
                

                <div id='area-input'>

                    <div class="form-group w-70 mt-3">
                        <label for="exampleInputEmail1">Number of Distribution Areas</label>
                        

                        <div class="input-group mb-3">
                            <input type="text" id="number-of-area" class="form-control"
                                placeholder="Enter Number of Distribution Areas" aria-label="Recipient's username"
                                aria-describedby="button-addon2" name="deal-area-num">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2" name="showbtn" value="add"
                                onclick="showbox()">Add</button>
                        </div>

                    </div>

                    <div class="form-group w-70 mt-3" id="member-1" style="display: none;">
                        <label for="exampleInputEmail1">Area Code <span>1</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Area Code" name="deal-area-1" required>

                    </div>

                </div>

                <script>

                    function showbox() {
                        
                        var koyta = document.getElementById('number-of-area').value;
                        var lp = parseInt(koyta);
                        if (lp == 0) return;


                

                        document.getElementById('member-1').style.display = "block";
                        
                        let i;
                        for (i = 0; i < lp - 1; i++) {
                            var clone = document.getElementById('member-1').cloneNode(true);
                            clone.children[0].children[0].innerHTML = (i + 2).toString();
                            console.log('hoise ' + (i + 2).toString());
                            document.getElementById('area-input').appendChild(clone);
                            // document.getElementById('member-info').style.display="block";
                            clone.style.display = "block";
                            clone.id = 'member-'+(i+2).toString();
                            clone.children[1].name = 'deal-area-'+(i+2).toString();

                        }



                    }

                </script>



                <div class="form-group w-70 mt-3">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password"
                      name="deal-password"  required>
                </div>

                <div class="text-center" style="margin-top:20px;"><button class="buttonn" type="submit" name="submitbtn" value="submitval">Submit</button></div>
            </div>
        </form>









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

                                Designed by <a href="https://Group-5 /">Group-5 (14,31,32,34,36)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!-- End  Footer -->


        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
    </div>

</body>
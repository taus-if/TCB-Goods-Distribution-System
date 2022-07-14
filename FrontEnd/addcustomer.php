<?php
if (!isset($_SESSION)) {
    session_start();
}

$conn = oci_connect('XE', 'XE', 'localhost/xe')
or die(oci_error());

if(!$conn){
  echo "not connected";
}else{
    if($_SERVER['REQUEST_METHOD']=='POST'){

        if($_POST['submitbtn']=='submitval'){

            $cust_nid = $_SESSION['cust_nid'];
            $cusname = $_POST['cus_name'];
            $cusocc = $_POST['cus_occupation'];
            $gender = $_POST['gender'];
            $spname = $_POST['spousename'];

            $mobile = $_POST['mobilenum'];

            $holdingno = $_POST['holdingno'];
            $roadno = $_POST['roadno'];
            $wardno = $_POST['wardno'];
            $union = $_POST['union'];
            $district = $_POST['district'];
            $upazilla = $_POST['upazilla'];
            
            $cusincome = (double) ($_POST['cus_income']);
            $dob = $_POST['dob'];
            //$_SESSION['uname']= $username;
            //$_SESSION['profile'] = $username;  
            $familynum = (int) ($_POST['familynum']);

            /*if(isset($cusname) && isset($cusocc) && isset($gender) && isset($spname) && isset($holdingno) && isset($roadno) && isset($wardno) && isset($union) && isset($upazilla) && isset($district) && isset($dob) && isset($cusincome) ){ */
            $sql = "insert into customer_info(nid, name, occupation, spouse, mobile_no, tcb_card_no, gender, income, date_of_birth,no_of_family_members,age, holding_no, road, area_code,package_no)
            values('$cust_nid', '$cusname', '$cusocc', '$spname','$mobile',concat('C',lpad(tcb_card_no_seq.nextval,6,'0')), '$gender', $cusincome, to_date('$dob', 'mm/dd/yyyy'), $familynum, TRUNC(months_between(sysdate, to_date('$dob','mm/dd/yyyy')) / 12), '$holdingno', '$roadno', '002', '1')";

            $sql2 = "insert into family_info(member_nid, member_name, member_occupation, member_income, nid)
            values('$cust_nid', '$cusname', '$cusocc', $cusincome, '$cust_nid')";



                $stid=oci_parse($conn, $sql);
                oci_execute($stid); 

                $stid=oci_parse($conn, $sql2);
                oci_execute($stid); 

                unset($cust_nid);
                unset($cusname);
                unset($gender);
                unset($cusocc);
                unset($holdingno);
                unset($spname);
                unset($wardno);
                unset($roadno);
                unset($upazilla);
                unset($union);
                unset($dob);
                unset($district);
                unset($cusincome);
                unset($familynum);
                unset($mobile);
                header("Location: ".$_SERVER['PHP_SELF']);
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



    <!-- For Date picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
    <!-- Date picker end -->

    <!-- jquery -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->


</head>

<body>

    <div class="everything">
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
                        <!-- <li><a class="nav-link scrollto active" href="">Admin</a></li> -->
                        <li class="dropdown"><a href="#"><span>UserName</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <!-- <li><a href="admin_profile.php">Profile</a></li> -->
                                <li><a href="notification.html">Notification</a></li>
                                <li><a href="/logout">Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->


        <form action="addcustomer.php" method="post" class="Rafatdealer row d-flex justify-content-center">


            <div class="col-sm-10 col-md-8 col-lg-6 outterround">

                <div class="h1 d-flex justify-content-center" style="margin-bottom: 30px;">Customer Information</div>

                <div class="form-group w-70">
                    <label for="exampleInputEmail1">Customer Name</label>
                    <input type="text" class="form-control" id="cust_name" name="cus_name" aria-describedby="emailHelp"
                        placeholder="Enter Name" >

                </div>


                <div class="form-group w-70 mt-3">
                    <label for="exampleInputEmail1">Occupation</label>
                    <input type="text" class="form-control" id="occupation" name="cus_occupation" aria-describedby="emailHelp"
                        placeholder="Enter Occupation" >

                </div>

                <div class="w-70 mt-3">
                    <label for="exampleInputEmail1" class="form-label">Gender</label> <br>
                    <div class="d-flex justify-content-around">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                </div>

                <div class="form-group w-70 mt-3">
                    <label for="exampleInputEmail1">Husband/Wife's Name</label>
                    <input type="text" class="form-control" id="spousename" name="spousename" aria-describedby="emailHelp"
                        placeholder="Enter Husband/Wife's Name" >

                </div>

                <div class="form-group w-70 mt-3">
                    <label for="exampleInputEmail1">Mobile No</label>
                    <input type="text" class="form-control" id="mobilenum" name="mobilenum" aria-describedby="emailHelp"
                        placeholder="Enter Mobile No" >

                </div>

                <div class="form-group w-70 mt-3">
                    <label for="exampleInputEmail1">Address</label>

                    <div class="row">
                        <div class="col mt-3">
                            <label for="exampleInputEmail1">Holding No</label>

                            <input type="text" class="form-control" id="holding" aria-describedby="emailHelp"
                                placeholder="Enter Holding No" name="holdingno" >
                        </div>
                        <div class="col mt-3">
                            <label for="exampleInputEmail1">Road No</label>

                            <input type="text" class="form-control" id="road" aria-describedby="emailHelp"
                                placeholder="Enter Road No" name="roadno" >
                        </div>

                    </div>

                    <div class="row">
                        <div class="col mt-3">
                            <label for="exampleInputEmail1">Ward No</label>

                            <input type="text" class="form-control" id="ward" aria-describedby="emailHelp"
                                placeholder="Enter Ward No" name="wardno" >
                        </div>
                        <div class="col mt-3">
                            <label for="exampleInputEmail1">Union</label>

                            <input type="text" class="form-control" id="union" aria-describedby="emailHelp"
                                placeholder="Enter Union Name" name="union" >
                        </div>

                    </div>
                    <div class="row">
                        <div class="col mt-3">
                            <label for="exampleInputEmail1">Upazilla</label>

                            <input type="text" class="form-control" id="upazilla" aria-describedby="emailHelp"
                                placeholder="Enter Upazilla Name" name="upazilla" >
                        </div>
                        <div class="col mt-3">
                            <label for="exampleInputEmail1">District</label>

                            <input type="text" class="form-control" id="district" aria-describedby="emailHelp"
                                placeholder="Enter District Name" name="district" >
                        </div>

                    </div>

                </div>

                <div class="form-group w-70 mt-3">
                    
                    <label for="datepicker">Date of Birth</label>
                    <input type="text" id="datepicker" class="form-control" placeholder="Enter Date of Birth" name="dob" >
                </div>

                <div class="form-group w-70 mt-3">
                    <label for="exampleInputEmail1">Income</label>
                    <input type="text" class="form-control" id="income" aria-describedby="emailHelp"
                        placeholder="Enter Monthly Income" name="cus_income" >

                </div>

                <div id='member-input'>

                    <div class="form-group w-70 mt-3">
                        <label for="exampleInputEmail1">Number of Family Members</label>

                        <div class="input-group mb-3">
                            <input type="text" id="familymemberNo" name="familynum" class="form-control"
                                placeholder="Enter Number of Family Members" aria-label="Recipient's username"
                                aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                                onclick="showbox()" name="showboxbtn" value="add">Add</button>
                        </div>

                    </div>

                    <div class="form-group w-70 mt-3" id="member-1" style="display: none;">
                        <label for="exampleInputEmail1">Family Member <span>1</span></label>
                        <!-- <input type="text" class="form-control" id="members" aria-describedby="emailHelp"
                        placeholder="Enter Number of Family Members" required> -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nid-fam" placeholder="name@example.com">
                            <label for="floatingInput">NID No</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="occupation-fam" placeholder="name@example.com">
                            <label for="floatingInput">Occupation</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="income-fam" placeholder="name@example.com">
                            <label for="floatingInput">Income</label>
                        </div>


                    </div>

                </div>

                <script>
                    function showbox() {

                        var koyta = document.getElementById('familymemberNo').value;
                        var lp = parseInt(koyta);
                        if (lp == 0) return;




                        document.getElementById('member-1').style.display = "block";

                        let i;
                        for (i = 0; i < lp - 1; i++) {
                            var clone = document.getElementById('member-1').cloneNode(true);
                            clone.children[0].children[0].innerHTML = (i + 2).toString();
                            console.log('hoise ' + (i + 2).toString());
                            document.getElementById('member-input').appendChild(clone);
                            // document.getElementById('member-info').style.display="block";
                            clone.style.display = "block";
                            clone.id = 'member-' + (i + 2).toString();
                        }



                    }
                </script>


                <div class="text-center" style="margin-top:20px;"><button class="buttonn" name="submitbtn" type="submit" value="submitval">Submit</button>
                </div>

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

</html>
<?php
  session_start();

   if(session_id() == "" || !isset($_SESSION['User']))
   {
        header('location: ../index.php');
   }

   require '../Datacon.php';

   if(!$conn)
   {
    header('location: ../error/Databaseerror.php');
   }
?>
<?php
    if(isset($_POST['csubmit'])){
        if(isset($_POST['rdate'])){
            $rid = $_GET['rid'];
            $query = "select * from reservation where Res_ID='$rid'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);

            $cusid = $row[1];
            $carid = $row[2];
            $sdate = $row[3];
            $edate = $_POST['rdate'];

            $iquery = "insert into rental(CUS_ID, CAR_ID, START_DATE, END_DATE, RENT_STATUS) values ('$cusid', '$carid', '$sdate', '$edate', 'onRent')";
            $iresult = mysqli_query($conn, $iquery);

            if($iresult){
                $cid = $_GET['cid'];
                $cquery = "update cars set CAR_STATUS='onRent' where CAR_ID='$cid'";
                $rquery = "update reservation set RES_STATUS='Complete' where Res_ID='$rid'";

                if(mysqli_query($conn, $cquery) && mysqli_query($conn, $rquery)){
                    header('location: rentCars.php');
                } else {
                    echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 30px;'>
                            <center>Error! please try again later</center>
                        </div>";
                }
            } else {
                echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 30px;'>
                            <center>Error! please try again later</center>
                        </div>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard-Admin</title>
        <!-- Favicon-->
        <link rel="shortout icon" type="image/x-icon" href="../img/favicon.png"/>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="../css/style.css" rel="stylesheet"/>
      <link rel="stylesheet" href="css/line-icons.css">
      <link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css'>

        <meta charset="utf-8">

        <style>
            .form-control{
                color: #888888 !important;
            }
            .drop{
                height: 52px !important;
                background: #fff !important;
                font-size: 18px;
                border-radius: 5px;
                box-shadow: none !important;

                display: block;
                padding: 0.375rem 0.75rem;
                font-weight: 400;
                line-height: 1.5;
                border: 1px solid #ced4da;
            }

            select {
                color: #888888;
            }
            
            select option:valid{
                color: #000000;
            }
        </style>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard.php" style='color: black;'><h2><b>CAR</b><b style="color: #01d28e;">BOOK</h2></b></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="addCars.php" style='color: black;'>Add car</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="availableCars.php">Available cars</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="reservedCars.php">Reserved cars</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="rentCars.php">Cars on rent</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="groundVehical.php">Grounded vehical</a>
                </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-outline-primary" id="sidebarToggle"><span class="lni-bulb"></span></button>
                        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="../index.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                
                    <div class="container-fluid" style='padding-left: 5%; padding-right: 5%;'>
                        <center><h1 class="mt-4">Drop-off date</h1></center>
                        <form action='dashboard.php'><input type='submit' class='btn btn-primary' name='btnaddadmin' value="Back"></form><hr>
                        <center><div style='background-color:; width: 75%;'>
                            <form method='post' enctype="multipart/form-data">
                                <?php
                                    $rid = $_GET['rid'];
                                    $query = "select PICKUP_DATE from reservation where Res_ID='$rid'";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_array($result);

                                    $date = $row[0];
                                    $tom = date('Y-m-d', strtotime($date . ' +1 day'));
                                ?>
                                <input type='date' id='datePicker' name='rdate' min='<?php echo $tom; ?>' class='form-control' style='width:50%; background: white;'>
                                <br>
                                <input type='submit' value='submit' name='csubmit' class='btn btn-success'>
                            </form>
                        </div></center>
                        <div style="height: 50px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright Start  -->
     
      <!-- Copyright End -->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
        <script src="../js/jquery-min.js"></script>
        <script src='//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
        <script src='//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js'></script>
        <script src='//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js'></script>
    <!-- <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/classie.js"></script>
    <script src="../js/color-switcher.js"></script>
    <script src="../js/jquery.mixitup.js"></script>
    <script src="../js/nivo-lightbox.js"></script>
    <script src="../js/owl.carousel.js"></script>    
    <script src="../js/jquery.stellar.min.js"></script>    
    <script src="../js/jquery.nav.js"></script>    
    <script src="../js/scrolling-nav.js"></script>    
    <script src="../js/jquery.easing.min.js"></script>     
    <script src="../js/wow.js"></script> 
    <script src="../js/jquery.vide.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>    
    <script src="../js/jquery.magnific-popup.min.js"></script>    
    <script src="../js/waypoints.min.js"></script>    
    <script src="../js/form-validator.min.js"></script>
    <script src="../js/contact-form-script.js"></script>   
    <script src="../js/main.js"></script> -->
    </body>
</html>
<?php
  session_start();

   if(session_id() == "" || !isset($_SESSION['User']))
   {
        header('location: ../index.php');
   }

   require '../datacon.php';
?>
<?php
    if(isset($_COOKIE['erravailable'])){
        echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 30px;'>
                            <center>Error! please try again later</center>
                        </div>";
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

    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <!-- <a class="navbar-brand" href="../index.html">Car<span>Book</span></a> -->
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard.php" style='color: black;'><h2><b>CAR</b><b style="color: #01d28e;">BOOK</h2></b></a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="addCars.php">Add car</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="availableCars.php">Available cars</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="reservedCars.php">Reserved cars</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="rentCars.php" style="color: black;">Cars on rent</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="groundVehical.php">Grounded vehical</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <!-- <button class="btn btn-outline-primary" id="sidebarToggle"><span class="lni-bulb"></span></button> -->
                        
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
                        <center><h1 class="mt-4">Rented Cars</h1></center>
                        <!-- <table style='width: 100%;'>
                            <tr>
                                <td>
                                <div class="card" style="width: 25rem">
                                    <img src="../images/car-1.jpg" class="card-img-top" alt="Mercedes Grand Sedan">
                                    <div class="card-body text">
                                        <h2 class="mb-0"><a href="#">Mercedes Grand Sedan</a></h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat">Chevrolet</span>
                                            <p class="price ml-auto">$500 <span>/day</span></p>
                                        </div>
                                        <p class="d-flex mb-0 d-block">
                                            <a href="#" class="btn btn-primary py-2 mr-1">Book now</a>
                                            <a href="#" class="btn btn-secondary py-2 ml-1">Details</a>
                                        </p>
                                    </div>
                                </div>
                                </td>
                                <td>
                                <div class="card" style="width: 25rem">
                                    <img src="../images/car-1.jpg" class="card-img-top" alt="Mercedes Grand Sedan">
                                    <div class="card-body text">
                                        <h2 class="mb-0"><a href="#">Mercedes Grand Sedan</a></h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat">Chevrolet</span>
                                            <p class="price ml-auto">$500 <span>/day</span></p>
                                        </div>
                                        <p class="d-flex mb-0 d-block">
                                            <a href="#" class="btn btn-primary py-2 mr-1">Book now</a>
                                            <a href="#" class="btn btn-secondary py-2 ml-1">Details</a>
                                        </p>
                                    </div>
                                </div>


                                </td>
                                <td>
                                <div class="card" style="width: 25rem">
                                    <img src="../images/car-1.jpg" class="card-img-top" alt="Mercedes Grand Sedan">
                                    <div class="card-body text">
                                        <h2 class="mb-0"><a href="#">Mercedes Grand Sedan</a></h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat">Chevrolet</span>
                                            <p class="price ml-auto">$500 <span>/day</span></p>
                                        </div>
                                        <p class="d-flex mb-0 d-block">
                                            <a href="#" class="btn btn-primary py-2 mr-1">Book now</a>
                                            <a href="#" class="btn btn-secondary py-2 ml-1">Details</a>
                                        </p>
                                    </div>
                                </div>
                                </td>
                                <td>
                                <div class="card" style="width: 25rem">
                                    <img src="../images/car-1.jpg" class="card-img-top" alt="Mercedes Grand Sedan">
                                    <div class="card-body text">
                                        <h2 class="mb-0"><a href="#">Mercedes Grand Sedan</a></h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat">Chevrolet</span>
                                            <p class="price ml-auto">$500 <span>/day</span></p>
                                        </div>
                                        <p class="d-flex mb-0 d-block">
                                            <a href="#" class="btn btn-primary py-2 mr-1">Book now</a>
                                            <a href="#" class="btn btn-secondary py-2 ml-1">Details</a>
                                        </p>
                                    </div>
                                </div>
                                </td>
                            </tr>
                        </table><hr> --><hr>
                        <div class="container">
                            <div class="row">
                                <?php
                                    $aquery = "Select * from rental inner join cars on rental.CAR_ID = cars.CAR_ID where rental.RENT_STATUS='onRent'";
                                    $aresult = mysqli_query($conn, $aquery);

                                    if(mysqli_affected_rows($conn) > 0){
                                        while($row = mysqli_fetch_array($aresult)){
                                ?>
                                        <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                                            <div class="card h-100">
                                                <img src="../<?php echo $row[17]; ?>" class="card-img-top" alt="Mercedes Grand Sedan">
                                                <div class="card-body text">
                                                    <h5 class="mb-0"><a href="#"><?php echo $row[7] . " " . $row[8]; ?></a></h2>
                                                    <span class="cat">Pickup date: <?php echo $row[3]; ?></span><br>
                                                    <span class="cat">drop date: <?php echo $row[4]; ?></span><br>
                                                    <div class="d-flex mb-3">
                                                        <span class="cat">Plate: <?php echo $row[10]; ?></span>
                                                        <p class="price ml-auto">$<?php echo $row[11]; ?> <span>/day</span></p>
                                                    </div>
                                                    <p class="d-flex mb-0 d-block"><a href="checkPayment.php?rid=<?php echo $row[0]; ?>&cid=<?php echo $row[2]; ?>" class="btn btn-success py-2 mr-1" style="width: 100%;">Mark available</a></p>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="col-md-12">
                                            <center><h3 class='mt-4'>No rented vehicle</h3></center>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright Start  -->
     
      <!-- Copyright End -->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="js/jquery-min.js"></script>
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
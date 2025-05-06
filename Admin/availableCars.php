<?php
  session_start();

   if(session_id() == "" || !isset($_SESSION['User']))
   {
        header('location: ../index.php');
   }

   require '../datacon.php';
?>
<?php
    if(isset($_COOKIE['errground'])){
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

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="availableCars.php" style='color: black;'>Available cars</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="reservedCars.php">Reserved cars</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="rentCars.php">Cars on rent</a>
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
                        <center><h1 class="mt-4">Available Cars</h1></center>
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
                        <form action="#" method="POST" class="mb-5 p-4 bg-white shadow-sm rounded" style="border: 1px solid #ddd;">
            <div class="row align-items-end">
                <!-- Dropdown -->
                <div class="col-md-4">
                    <label for="carType">Search by</label>
                    <select name="searchBy" id="carType" class="form-control">
                        <option value="" disabled selected hidden>All</option>
                        <option value="brand" <?php if(isset($_COOKIE['by'])){if($_COOKIE['by'] == "brand"){echo "selected";}}?>>Brand</option>
                        <option value="model" <?php if(isset($_COOKIE['by'])){if($_COOKIE['by'] == "model"){echo "selected";}}?>>Model</option>
                        <option value="type" <?php if(isset($_COOKIE['by'])){if($_COOKIE['by'] == "type"){echo "selected";}}?>>Gas Type</option>
                        <option value="transmission" <?php if(isset($_COOKIE['by'])){if($_COOKIE['by'] == "transmission"){echo "selected";}}?>>Transmission</option>
                        <option value="seat" <?php if(isset($_COOKIE['by'])){if($_COOKIE['by'] == "seat"){echo "selected";}}?>>Seat</option>
                        <option value="lugguage" <?php if(isset($_COOKIE['by'])){if($_COOKIE['by'] == "seat"){echo "selected";}}?>>lugguage</option>
                    </select>
                </div>

                <script>
                  $(document).ready(function() {
                    $('#carType').on('change', function() {
                      if($(this).val() == "brand"){
                        $('#all').css('display', 'none');
                        $('#brand').css('display', 'block');
                        $('#model').css('display', 'none');
                        $('#type').css('display', 'none');
                        $('#transmission').css('display', 'none');
                        $('#seat').css('display', 'none');
                        $('#lugguage').css('display', 'none');
                      } else if($(this).val() == 'model') {
                        $('#all').css('display', 'none');
                        $('#brand').css('display', 'none');
                        $('#model').css('display', 'block');
                        $('#type').css('display', 'none');
                        $('#transmission').css('display', 'none');
                        $('#seat').css('display', 'none');
                        $('#lugguage').css('display', 'none');
                      } else if($(this).val() == 'type'){
                        $('#all').css('display', 'none');
                        $('#brand').css('display', 'none');
                        $('#model').css('display', 'none');
                        $('#type').css('display', 'block');
                        $('#transmission').css('display', 'none');
                        $('#seat').css('display', 'none');
                        $('#lugguage').css('display', 'none');
                      } else if($(this).val() == 'transmission'){
                        $('#all').css('display', 'none');
                        $('#brand').css('display', 'none');
                        $('#model').css('display', 'none');
                        $('#type').css('display', 'none');
                        $('#transmission').css('display', 'block');
                        $('#seat').css('display', 'none');
                        $('#lugguage').css('display', 'none');
                      } else if($(this).val() == 'seat'){
                        $('#all').css('display', 'none');
                        $('#brand').css('display', 'none');
                        $('#model').css('display', 'none');
                        $('#type').css('display', 'none');
                        $('#transmission').css('display', 'none');
                        $('#seat').css('display', 'block');
                        $('#lugguage').css('display', 'none');
                      } else if($(this).val() == 'lugguage') {
                        $('#all').css('display', 'none');
                        $('#brand').css('display', 'none');
                        $('#model').css('display', 'none');
                        $('#type').css('display', 'none');
                        $('#transmission').css('display', 'none');
                        $('#seat').css('display', 'none');
                        $('#lugguage').css('display', 'block');
                      }
                    });
                  });

                  $(document).ready(function() {
                    $('#disText').on('click', function(){
                      alert('select type first');
                    });
                  });
                </script>

                <!-- Textbar -->
                <div class="col-md-4" id="all">
                    <label for="searchText">All</label>
                    <input type="text" name="searchText" id="disText" class="form-control" placeholder="Brand, Model, Gas Type, Transmission, Seat" value="<?php if(isset($_COOKIE['text'])){echo $_COOKIE['text'];}?>" readonly>
                </div>

                <div class="col-md-4" id="brand" style="display: none">
                    <label for="searchText">Brand</label>
                    <select name="searchText" id="carType" class="form-control">
                        <option value="" disabled selected hidden>Select</option>
                        <?php 
                          $query = "select distinct CAR_BRAND from cars where CAR_STATUS='Available' order by CAR_BRAND";
                          $result = mysqli_query($conn, $query);

                          while($row = mysqli_fetch_array($result))
                          {
                        ?>
                        <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
                        <?php
                          }
                        ?>
                    </select>
                </div>

                <div class="col-md-4" id="model" style="display: none">
                    <label for="searchText">Model</label>
                    <select name="searchText" id="carType" class="form-control">
                        <option value="" disabled selected hidden>Select</option>
                        <?php 
                          $query = "select distinct CAR_BRAND, CAR_MODEL from cars where CAR_STATUS='Available' order by CAR_BRAND";
                          $result = mysqli_query($conn, $query);

                          while($row = mysqli_fetch_array($result))
                          {
                        ?>
                        <option value="<?php echo $row[1]; ?>"><?php echo $row[0] . " " . $row[1]; ?></option>
                        <?php
                          }
                        ?>
                    </select>
                </div>

                <div class="col-md-4" id="type" style="display: none">
                    <label for="searchText">Type</label>
                    <select name="searchText" id="carType" class="form-control">
                        <option value="" disabled selected hidden>Select</option>
                        <?php 
                          $query = "select distinct CAR_TYPE from cars order by CAR_TYPE";
                          $result = mysqli_query($conn, $query);

                          while($row = mysqli_fetch_array($result))
                          {
                        ?>
                        <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
                        <?php
                          }
                        ?>
                    </select>
                </div>

                <div class="col-md-4" id="transmission" style="display: none">
                    <label for="searchText">Transmission</label>
                    <select name="searchText" id="carType" class="form-control">
                        <option value="" disabled selected hidden>Select</option>
                        <?php 
                          $query = "select distinct CAR_TRANSMISSION from cars order by CAR_TRANSMISSION";
                          $result = mysqli_query($conn, $query);

                          while($row = mysqli_fetch_array($result))
                          {
                        ?>
                        <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
                        <?php
                          }
                        ?>
                    </select>
                </div>

                <div class="col-md-4" id="seat" style="display: none">
                    <label for="searchText">Seat</label>
                    <select name="searchText" id="carType" class="form-control">
                        <option value="" disabled selected hidden>Select</option>
                        <?php 
                          $query = "select distinct CAR_SEAT from cars order by CAR_SEAT";
                          $result = mysqli_query($conn, $query);

                          while($row = mysqli_fetch_array($result))
                          {
                        ?>
                        <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
                        <?php
                          }
                        ?>
                    </select>
                </div>

                <div class="col-md-4" id="lugguage" style="display: none">
                    <label for="searchText">Luggage</label>
                    <select name="searchText" id="carType" class="form-control">
                        <option value="" disabled selected hidden>Select</option>
                        <?php 
                          $query = "select distinct CAR_LUGGAGE from cars order by CAR_LUGGAGE";
                          $result = mysqli_query($conn, $query);

                          while($row = mysqli_fetch_array($result))
                          {
                        ?>
                        <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
                        <?php
                          }
                        ?>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="col-md-4 mt-3 mt-md-0">
                    <input type="submit" class="btn btn-primary btn-block mb-2" value="Search" name="ssubmit">
                    <button type="submit" class="btn btn-outline-secondary btn-block" name="resetSearch">Reset</button>
                </div>
            </div>
        </form>
                            <div class="row">
                                <?php
                                    $aquery = "select * from cars where CAR_STATUS='Available'";
                                    if(isset($_POST['ssubmit'])){
                                        if(isset($_POST['searchBy']) && isset($_POST['searchText'])){
                                            $by = $_POST['searchBy'];
                                            $val = $_POST['searchText'];
                                            if($by == "brand"){
                                                $aquery = "select * from cars where CAR_BRAND='$val' and CAR_STATUS='Available'";
                                            } else if($by == "model"){
                                                $aquery = "select * from cars where CAR_MODEL='$val' and CAR_STATUS='Available'";
                                            } else if($by == "type"){
                                                $aquery = "select * from cars where CAR_TYPE='$val' and CAR_STATUS='Available'";
                                            } else if($by == "transmission"){
                                                $aquery = "select * from cars where CAR_TRANSMISSION='$val' and CAR_STATUS='Available'";
                                            } else if($by == "seat"){
                                                $aquery = "select * from cars where CAR_SEAT='$val' and CAR_STATUS='Available'";
                                            } else if($by == "lugguage"){
                                                $aquery = "select * from cars where CAR_LUGGAGE='$val' and CAR_STATUS='Available'";
                                            }
                                        } else {
                                            echo "<script>alert('please enter all the values')</script>";
                                        }
                                    }
                                    $aresult = mysqli_query($conn, $aquery);

                                    while($row = mysqli_fetch_array($aresult)){
                                ?>
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                                    <div class="card h-100">
                                        <img src="../<?php echo $row[11]; ?>" class="card-img-top" alt="Mercedes Grand Sedan">
                                        <div class="card-body text">
                                            <h5 class="mb-0"><a href="#"><?php echo $row[1] . " " . $row[2]; ?></a></h2>
                                            <span class="cat">Plate: <?php echo $row[4]; ?></span><br>
                                            <div class="d-flex mb-3">
                                                <span class="cat"><?php echo $row[3]; ?></span>
                                                <p class="price ml-auto">$<?php echo $row[5]; ?> <span>/day</span></p>
                                            </div>
                                            <p class="d-flex mb-0 d-block"><a href="editCars.php?id=<?php echo $row[0]; ?>" class="btn btn-success py-2 mr-1" style="width: 50%;">Edit</a><a href="GroundVehicalCode.php?id=<?php echo $row[0]; ?>" class="btn btn-danger py-2 mr-1" style="width: 50%;">Ground</a></p>
                                        </div>
                                    </div>
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
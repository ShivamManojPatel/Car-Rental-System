<?php
	session_start();
	require('../datacon.php');

  if(!isset($_SESSION['User'])){
    header('location: ../index.php');
  }

  if(!$conn){
    header('location: ../Error/error.php');
  }

  $cquery = "select * from cars where CAR_STATUS='Available'";
                if(isset($_POST['ssubmit'])){
                  if(isset($_POST['searchBy']) && isset($_POST['searchText'])){
                    $by = $_POST['searchBy'];
                    $val = $_POST['searchText'];
                    if($_POST['searchBy'] == "brand"){
                      $cquery = "select * from cars where CAR_BRAND='$val' and CAR_STATUS='Available'";
                    } else if($_POST['searchBy'] == "model"){
                      $cquery = "select * from cars where CAR_MODEL='$val' and CAR_STATUS='Available'";
                    } else if($_POST['searchBy'] == "type"){
                      $cquery = "select * from cars where CAR_TYPE='$val' and CAR_STATUS='Available'";
                    } else if($_POST['searchBy'] == "transmission"){
                      $cquery = "select * from cars where CAR_TRANSMISSION='$val' and CAR_STATUS='Available'";
                    } else if ($_POST['searchBy'] == "seat"){
                      $cquery = "select * from cars where CAR_SEAT='$val' and CAR_STATUS='Available'";
                    } else if ($_POST['searchBy'] == "lugguage"){
                      $cquery = "select * from cars where CAR_LUGGAGE='$val' and CAR_STATUS='Available'";
                    }
                  } else {
                    echo "<script>alert('please enter all the values')</script>";
                  }
                }

  if (isset($_POST['resetSearch'])) {
    header('location: dashboard.php');
  }
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
    <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
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
    </style>
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Car<span>Book</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="../index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="rentedCars.php" class="nav-link">Rented Cars</a></li>
	          <li class="nav-item"><a href="reservedCars.php" class="nav-link">Reserved Cars</a></li>
            <li class="nav-item"><a href="../logout.php" class="nav-link">Logout</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Choose Your Car</h1>
          </div>
        </div>
      </div>
    </section>
		

    
		<section class="ftco-section bg-light">
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
                $cresult = mysqli_query($conn, $cquery);

                if(mysqli_affected_rows($conn) > 0){
                  while($row = mysqli_fetch_array($cresult)){
              ?>
    			          <div class="col-md-4">
    			          	<div class="car-wrap rounded ftco-animate">
    			          		<div class="img rounded d-flex align-items-end" style="background-image: url(../<?php echo $row[11]; ?>);">
    			          		</div>
    			          		<div class="text">
    			          			<h2 class="mb-0"><a href="../car-single.php?id=<?php echo$row[0]; ?>"><?php echo $row[1] . " " . $row[2]; ?></a></h2>
                          <span class="cat">Plate: <?php echo $row[4]; ?></span>
    			          			<div class="d-flex mb-3">
	    		          				<span class="cat"><?php echo $row[3]; ?></span>
	    		          				<p class="price ml-auto">$<?php echo $row[5]; ?><span>/day</span></p>
    			          			</div>
					          		<p class="d-flex mb-0 d-block"><a href="<?php if(isset($_SESSION['User']) && $_SESSION['User_type'] == "Customer"){echo "bookCar.php?id=" . $row[0];}else{echo "login.php";}?>" class="btn btn-primary py-2 mr-1">Book now</a><a href="<?php if(isset($_SESSION['User']) && $_SESSION['User_type'] == "Customer"){echo "Reserve.php?id=" . $row[0];}else{echo "login.php";}?>" class="btn btn-success py-2 mr-1">Reserve</a></p>
					          	</div>
    			          	</div>
    			          </div>
				<?php
                  }
                } else {
                  ?>
                    <div class="col-12 text-center my-5">
                      <h2 style="color: #dc3545; font-weight: bold;">No Cars Found</h2>
                    </div>
                  <?php
                }
              ?>
    		</div>
        </div>
    </section>
    

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>book</span></a></h2>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Services</a></li>
                <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
                <li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Customer Support</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">FAQ</a></li>
                <li><a href="#" class="py-2 d-block">Payment Option</a></li>
                <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
                <li><a href="#" class="py-2 d-block">How it works</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">One Pace Plaza, New York, NY 10038</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+1 559 780 6361</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@carbook.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved with CarBook
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/jquery.timepicker.min.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>
    
  </body>
</html>
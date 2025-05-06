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
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query = "select * from cars where CAR_ID='$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
    } else {
        echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 30px;'>
                            <center>Error! please try again later</center>
                        </div>";
    }
?>
<?php
    if(isset($_POST['csubmit'])){
        if(!empty($_POST['cbrand']) && !empty($_POST['cmodel']) && !empty($_POST['cyear']) && !empty($_POST['cplate']) && !empty($_POST['cprice']) && !empty($_POST['ctype']) && !empty($_POST['cmilage']) && !empty($_POST['ctransmission']) && !empty($_POST['cseat']) && !empty($_POST['cluggage'])){
            $brand = $_POST['cbrand'];
            $model = $_POST['cmodel'];
            $year = $_POST['cyear'];
            $plate = $_POST['cplate'];
            $price = $_POST['cprice'];
            $type = $_POST['ctype'];
            $milage = $_POST['cmilage'];
            $transmission = $_POST['ctransmission'];
            $seat = $_POST['cseat'];
            $luggage = $_POST['cluggage'];
            $file = $row[11];
            $cflag=true;
            $count = 1;
            if(isset($_FILES['cimage']) && $_FILES['cimage']['error'] === UPLOAD_ERR_OK){
                $targetdir = "../Uploads/";
                $flag = true;
                $targetfile = $targetdir . $brand . "-" . $model . "-" . $year . "-" . $count. ".png";

                while($flag){
                    if(!file_exists($targetfile)){
                    $flag = false; 
                    } else {
                        $count++;
                        $targetfile = $targetdir . $brand . "-" . $model . "-" . $year . "-" . $count . ".png";
                    }
                }

                if($_FILES['cimage']['type'] == 'image/jpg' || $_FILES['cimage']['type'] == 'image/jpeg' || $_FILES['cimage']['type'] == 'image/png'){
                    if(move_upload_file($_FILES['cimage']['tmp_name'], $targetfile)){
                        $file = "Uploads/" . $brand . "-" . $model . "-" . $year . "-" . $count . ".png";
                    } else {
                        $cflag = false;
                    }
                } else {
                    $cflag = false;
                }
            } 

            if($cflag){
                $cquery = "update cars set CAR_BRAND='$brand', CAR_MODEL='$model', CAR_YEAR='$year', LICENSE_PLATE='$plate', CAR_AMOUNT='$price', CAR_TYPE='$type', CAR_MILEAGE='$milage', CAR_TRANSMISSION='$transmission', CAR_SEAT='$seat', CAR_LUGGAGE='$luggage', CAR_PHOTO='$file' where CAR_ID='$id'";
                $cresult = mysqli_query($conn, $cquery);

                if($cresult){
                    header('location: availableCars.php');
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
                            <center>Please upload jpg, jpeg, png file only</center>
                        </div>";
            }
        } else {
            echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 30px;'>
                            <center>Please!fill the details properly</center>
                        </div>";
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="addCars.php">Add car</a>
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
                        <center><h1 class="mt-4">Edit car</h1></center>
                        <form action='availableCars.php' method='POST'><input type='submit' class='btn btn-primary' name='btnaddadmin' value="Back"></form><hr>
                        <center><div style='background-color:; width: 75%;'>
                            <form method='post' enctype="multipart/form-data">
                                <input type='text' placeholder='Car Brand' name='cbrand' class='form-control' style='width:50%; background: white;' value='<?php if(isset($row[1])){echo $row[1];}?>'><br>
                                <input type='text' placeholder='Car Model' name='cmodel' class='form-control' style='width:50%; background: white;' value='<?php if(isset($row[2])){echo $row[2];}?>'><br>
                                <input type='text' placeholder='Car Model Year' name='cyear' class='form-control' style='width:50%; background: white;' value='<?php if(isset($row[3])){echo $row[3];}?>'><br>
                                <input type='text' placeholder='Car License Plate' name='cplate' class='form-control' style='width:50%; background: white;' value='<?php if(isset($row[4])){echo $row[4];}?>'><br>
                                <input type='text' placeholder='Car Price per day' name='cprice' class='form-control' style='width:50%; background: white;' value='<?php if(isset($row[5])){echo $row[5];}?>'><br>
                                <select name='ctype' class='drop form-contol' style='width:50%; background: white;'>
                                    <option value="" disabled selected hidden>Select type</option>
                                    <option value="Petrol" <?php if($row[6] == "Petrol"){echo "Selected";}?>>Petrol</option>
                                    <option value="Diesel" <?php if($row[6] == "Diesel"){echo "Selected";}?>>Diesel</option>
                                    <option value="Eletric" <?php if($row[6] == "Electric"){echo "Selected";}?>>Eletric</option>
                                </select>
                                <input type='text' placeholder='Car Milage' name='cmilage' class='form-control' style='width:50%; background: white;margin-top: 25px;' value='<?php if(isset($row[7])){echo $row[7];} ?>'><br>
                                <select name='ctransmission' class='drop form-contol' style='width:50%; background: white;'>
                                    <option value="" disabled selected hidden>Select trasmission type</option>
                                    <option value="Manual" <?php if($row[8] == "Manual"){echo "Selected";}?>>Manual</option>
                                    <option value="Automatic" <?php if($row[8] == "Automatic"){echo "Selected";}?>>Automatic</option>
                                </select>
                                <select name='cseat' class='drop form-contol' style='width:50%; background: white;margin-top: 25px;'>
                                    <option value="" disabled selected hidden>Select number of seats</option>
                                    <option value="2" <?php if($row[9] == "2"){echo "Selected";}?>>2</option>
                                    <option value="5" <?php if($row[9] == "5"){echo "Selected";}?>>5</option>
                                    <option value="8" <?php if($row[9] == "8"){echo "Selected";}?>>8</option>
                                </select>
                                <select name='cluggage' class='drop form-contol' style='width:50%; background: white;margin-top: 25px;'>
                                    <option value="" disabled selected hidden>Select number of luggage</option>
                                    <option value="2" <?php if($row[10] == "2"){echo "Selected";}?>>2</option>
                                    <option value="4" <?php if($row[10] == "4"){echo "Selected";}?>>4</option>
                                    <option value="6" <?php if($row[10] == "6"){echo "Selected";}?>>6</option>
                                </select>
                                <div style="margin-left: 20px;margin-top: 25px;">
                                    <img id="previewImg" src="../<?php if(isset($row[11])){echo $row[11];}?>" alt="Event Image" style="width: 175px; height: 110px; object-fit: cover; border: 1px solid #ccc; border-radius: 4px;">
                                </div>
                                <div class="form-group" style="width: 50%;">
                                    <label for="exampleFormControlFile1">Upload Event Image : </label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name='cimage' value="../<?php if(isset($row[6])){echo $row[6];}?>">
                                </div>
                                <br>
                                <input type='submit' value='submit' name='csubmit' class='btn btn-success' <?php if(!isset($_GET['id'])){echo "disabled";}?>>
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
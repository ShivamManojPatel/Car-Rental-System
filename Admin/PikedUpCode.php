<?php
    session_start();

    if(session_id() == "" || !isset($_SESSION['User']))
   {
        header('location: ../index.php');
   }

   require '../datacon.php';

   $id = $_GET['id'];
   $query = "update cars set CAR_STATUS='onRent' where CAR_ID='$id'";
   $result = mysqli_query($conn, $query);

   if($result){
    header('location: reservedCars.php');
   } else {
    setcookie("errground", "Error in grounding vehical", time()+60*2);
   }
?>
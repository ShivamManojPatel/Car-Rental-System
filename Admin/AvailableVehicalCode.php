<?php
    session_start();

    if(session_id() == "" || !isset($_SESSION['User']))
   {
        header('location: ../index.php');
   }

   require '../datacon.php';

   $id = $_GET['id'];
   $query = "update cars set CAR_STATUS='Available' where CAR_ID='$id'";
   $result = mysqli_query($conn, $query);

   if($result){
    if(isset($_GET['trace'])){
        header('location: ' . $_GET['trace']);
    } else {
        header('location: groundVehical.php');
    }
   } else {
    setcookie("erravailable", "Error in grounding vehical", time()+60*2);
   }
?>
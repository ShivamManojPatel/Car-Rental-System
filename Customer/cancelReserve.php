<?php
    session_start();
    require('../datacon.php');

    if(!isset($_SESSION['User'])){
        header('location: ../index.php');
    }
    
    if(!$conn){
        header('location: ../Error/error.php');
    }

    $rid = $_GET['id'];
    $cid = $_GET['cid'];

    $query1 = "update reservation set RES_STATUS='Cancelled' where Res_ID='$rid'";
    $query2 = "update cars set CAR_STATUS='Available' where CAR_ID='$cid'";

    $result1 = mysqli_query($conn, $query1);
    $result2 = mysqli_query($conn, $query2);

    if($result1 && $result2){
        header('location: dashboard.php');
    } else {
        setcookie('reserror', "Cancel error", time()+60);
        header('location: reservedCars.php');
    }
?>
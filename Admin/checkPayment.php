<?php
    session_start();

    if(session_id() == "" || !isset($_SESSION['User']))
    {
         header('location: ../index.php');
    }
 
    require '../datacon.php';

    if($conn){
        $rid = $_GET['rid'];
        $cid = $_GET['cid'];

        $query = "select * from payment where RENT_ID='$rid'";
        $result = mysqli_query($conn, $query);

        if(mysqli_affected_rows($conn) > 0){
            $rquery = "update rental set RENT_STATUS='Complete' where Rent_ID='$rid'";
            $cquery = "update cars set CAR_STATUS='Available' where CAR_ID='$cid'";

            if(mysqli_query($conn, $rquery) && mysqli_query($conn, $cquery)){
                header('location: dashboard.php');
            } else {
                setcookie("erravailable", "erravailable", time()+60);
                header('location: rentCars.php');
            }
        } else {
            header('location: payment.php?rid=' . $rid . '&cid=' . $cid);
        }
    }
?>
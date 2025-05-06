<?php
    session_start();

    if(session_id() == "" || !isset($_SESSION['User']))
    {
         header('location: ../index.php');
    }
 
    require '../datacon.php';
    $rid = $_GET['rid'];
    $days = $_GET['days'];
    $cid=$_GET['cid'];
    $amount = ((float)$_GET['amount'])*$days;
    $tax = (float)$amount*0.2;
    $tamount = $amount+$tax;
    $date = date('Y-m-d');

    $query = "insert into payment(RENT_ID, PAYMENT_DATE, TOTAL_AMOUNT, PAYMENT_METHOD)values('$rid', '$date', '$tamount', 'Credit Card')";
    $result = mysqli_query($conn, $query);

    if($result){
        $rquery = "update rental set RENT_STATUS='Complete' where Rent_ID='$rid'";
        $cquery = "update cars set CAR_STATUS='Available' where CAR_ID='$cid'";

       if(mysqli_query($conn, $rquery) && mysqli_query($conn, $cquery)){
            header('location: dashboard.php');
        } else {
            setcookie("erravailable", "erravailable", time()+60);
            header('location: rentCars.php');
        }
    } else {
        setcookie("erravailable", "erravailable", time()+60);
        header('location: rentCars.php');
    }
?>
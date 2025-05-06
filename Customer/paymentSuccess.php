<?php
    session_start();

    if(session_id() == "" || !isset($_SESSION['User']))
    {
         header('location: ../index.php');
    }
 
    require '../datacon.php';

    $days = $_GET['days'];
    $cid=$_GET['cid'];
    $amount = ((float)$_GET['amount'])*$days;
    $tax = (float)$amount*0.2;
    $tamount = $amount + $tax;
    $start = $_GET['start'];
    $end = $_GET['end'];
    $uid = $_SESSION['UserID'];
    $date = date('Y-m-d');

    $query1 = "insert into rental(CUS_ID, CAR_ID, START_DATE, END_DATE, RENT_STATUS) values ('$uid', '$cid', '$start', '$end', 'onRent')";

    if(mysqli_query($conn, $query1)){
        $rquery = "select max(Rent_ID) from rental";
        $rresult = mysqli_query($conn, $rquery);
        $row = mysqli_fetch_array($rresult);

        $query = "insert into payment(RENT_ID, PAYMENT_DATE, TOTAL_AMOUNT, PAYMENT_METHOD)values('$row[0]', '$date', '$tamount', 'Credit Card')";
        $result = mysqli_query($conn, $query);
        
        if($result){
            $cquery = "update cars set CAR_STATUS='onRent' where CAR_ID='$cid'";
            if(mysqli_query($conn, $cquery)){
                header('location: rentedCars.php');
            } else {
                setcookie("erravailable", "erravailable", time()+60);
                header('location: dashboard.php');
            }
        } else {
            setcookie("erravailable", "erravailable", time()+60);
            header('location: dashboard.php');
        }
    } else {
        setcookie("erravailable", "erravailable", time()+60);
        header('location: dashboard.php');
    }
?>
<?php
    session_start();

    if(session_id() == "" || !isset($_SESSION['User']))
    {
         header('location: ../index.php');
    }
 
    require '../datacon.php';
    require "../vendor/autoload.php";
    $secretkey = "sk_test_51RHR2wPDTaoTmLIjs0bgTlXBoZgzchiCDzhqMsiJSWxW7WNkhsD2XAfoylYflxq1KWX55W4YS1IeP9Ozk7Fb9YZB00JIKhdDxq";

    \Stripe\Stripe::setApiKey($secretkey);

    $rid = $_GET['rid'];
    $cid = $_GET['cid'];

    $query1 = "select * from rental where Rent_ID='$rid'";
    $query2 = "select * from cars where CAR_ID='$cid'";
    $result1 = mysqli_query($conn, $query1);
    $result2 = mysqli_query($conn, $query2);

    if($result1 && $result2){

        $row1 = mysqli_fetch_array($result1);
        $row2 = mysqli_fetch_array($result2);
        $start = new DateTime($row1[3]);
        $end = new DateTime($row1[4]);
        $interval = $start->diff($end);
        $carName = $row2[1] . " " . $row2[2];

        $noofdays = $interval->days;
        $checkout_Session = \Stripe\Checkout\Session::create([
            "mode" => "payment",
            "success_url" => "http://localhost/CarRentalSystem/Admin/paymentSuccess.php?rid=$rid&cid=$cid&amount=$row2[5]&days=$noofdays",
            "cancel_url" => "http://localhost/CarRentalSystem/Admin/rentCars.php",
            "line_items" => [
                [
                    "quantity" => 1,
                    "price_data" => [
                        "currency" => "usd",
                        "unit_amount" => (($row2[5] + ($row2[5]*0.2))*$noofdays) * 100,
                        "product_data" => [
                            "name" => "$carName"
                        ]
                    ]
                ]
            ]
        ]);

        http_response_code(303);
        header("location: " . $checkout_Session -> url);
    } else {
        setcookie("erravailable", "erravailable", time()+60);
        header('location: rentCars.php');
    }
?>
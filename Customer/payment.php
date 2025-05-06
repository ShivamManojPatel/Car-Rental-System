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

    $cid = $_GET['cid'];
    $pdate = $_GET['pdate'];
    $ddate = $_GET['ddate'];

    $query = "select * from cars where CAR_ID='$cid'";
    $result = mysqli_query($conn, $query);

    if($result){

        $row = mysqli_fetch_array($result);
        
        $start = new DateTime($pdate);
        $end = new DateTime($ddate);
        $interval = $start->diff($end);
        $carName = $row[1] . " " . $row[2];

        $noofdays = $interval->days;
        $checkout_Session = \Stripe\Checkout\Session::create([
            "mode" => "payment",
            "success_url" => "http://localhost/CarRentalSystem/Customer/paymentSuccess.php?cid=$cid&amount=$row[5]&days=$noofdays&start=$pdate&end=$ddate",
            "cancel_url" => "http://localhost/CarRentalSystem/Customer/dashboard.php",
            "line_items" => [
                [
                    "quantity" => 1,
                    "price_data" => [
                        "currency" => "usd",
                        "unit_amount" => (($row[5] + ($row[5]*0.2))*$noofdays) * 100,
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
        header('location: dashboard.php');
    }
?>
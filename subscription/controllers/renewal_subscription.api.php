<?php 
session_start();
date_default_timezone_set("Asia/Karachi");
require_once('../models/subscription.class.php');
$obj = new subscription();


$card_owner = $_POST['card_owner'];
$cvv = $_POST['cvv'];
$card_number = $_POST['card_number'];
$month = $_POST['month'];
$year = $_POST['year'];
$subscription_plan = $_POST['plans'];
$id = $_SESSION['userId'];
$subscription_date = date('d-m-y');
$subscription_expiry_date =  date('Y/m/d',strtotime('+30 days',strtotime(str_replace('/', '-', $subscription_date))));
$user_id = $_SESSION['userId'];

if($obj->selectDataByUserId($user_id, $card_owner, $card_number, $month.'/'.$year,
        $subscription_plan, $subscription_date, $subscription_expiry_date) != false) {

    echo json_encode(array('status' => 'Re-Subscribed Successfully'));
}
else{
    echo json_encode(array('status' => 'Something went wrong!'));
}


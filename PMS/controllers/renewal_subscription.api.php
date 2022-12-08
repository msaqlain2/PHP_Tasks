<?php
session_start();

date_default_timezone_set("Asia/Karachi");
require_once('../models/subscription.class.php');

$invoice = rand(100,100000);
$card_number = $_POST['card'];
$plans = $_POST['plan'];
$id = $_SESSION['userId'];
$current_date = date('Y-m-d');
$subs_expiry_date =  date('Y-m-d',strtotime('+30 days',strtotime(str_replace('/', '-', $current_date))));

$obj = new subscription();


if($obj->subscribe($id, $invoice, $card_number, $plans, $current_date, $subs_expiry_date, 
    $current_date) !== false) {
    echo json_encode(array("status" => 'Re-Subscribed Successfully'));
}

else{
    echo json_encode(array("status" => 'failed'));   
}

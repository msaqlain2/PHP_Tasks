<?php
session_start();

date_default_timezone_set("Asia/Karachi");
require_once('../models/subscription.class.php');
$card_owner = $_POST['card_owner'];
$cvv = $_POST['cvv'];
$card_number = $_POST['card_number'];
$month = $_POST['month'];
$year = $_POST['year'];
$plans = $_POST['plans'];
$id = $_SESSION['userId'];
$current_date = date('d-m-y');
$subs_expiry_date =  date('Y/m/d',strtotime('+30 days',strtotime(str_replace('/', '-', $current_date))));

$obj = new subscription();

$column = array(
    "card_owner" => "$card_owner",
    "card_number" => "$card_number",
    "card_expiry_date" => "$month".'/'.$year,
    "user_id" => "$id",
    "subscription_plan" => "$plans",
    "subscription_date" => "$current_date",
    "subscription_expiry_date" => "$subs_expiry_date",
);

if($obj->insertData('card_details', $column) !== false) {
	echo json_encode(array("status" => 'success'));
}

else{
    echo json_encode(array("status" => 'failed'));   
}

<?php
error_reporting(0);
session_start();

require_once('../../models/subscription.class.php');
$user_id = $_SESSION['userId'];
$card_status = "Expired";
// $card_owner = $_POST['card_owner'];
// $cvv = $_POST['cvv'];
// $card_number = $_POST['card_number'];
// $month = $_POST['month'];
// $year = $_POST['year'];
// $plans = $_POST['plans'];
// $id = $_SESSION['userId'];
// $current_date = date('d-m-y');
// $subs_expiry_date =  date('Y/m/d',strtotime('+30 days',strtotime(str_replace('/', '-', $current_date))));

$obj = new subscription();
// if($_REQUEST['status'] == "Subscription Expired") {
	$obj->selectDataByUserId($user_id, $card_status);
// }




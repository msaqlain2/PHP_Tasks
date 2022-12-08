<?php
require_once('../../models/subscription.class.php');
session_start();
date_default_timezone_set("Asia/Karachi");

$obj = new subscription();
$cc = explode(',',$_POST['cci']);
$values = array();
for ($i=0; $i<sizeof($cc);$i+=5){
    $temp = "(
        '".$_SESSION['userId']."',
        '".$cc[$i+1]."',
        '".$cc[$i]."',
        '".$cc[$i+2]."',
        '".$cc[$i+3]."',
        '".$cc[$i+4]."',
        '".'0'."',
        '".date('Y-m-d')."'

    )";
    array_push($values,$temp);
}

$sql = "INSERT INTO `users_cards`(`user_id`, `card_number`, `card_type`, `card_holder_name`, `card_expiry_date`, `cvv`, `card_status`, `created_at`) 
    VALUES ".implode(',',$values);

if($obj->customQuery($sql)) {
    echo json_encode(array("status" => "success"));
}
else{
    echo json_encode(array("status" => "failed"));
}
?>
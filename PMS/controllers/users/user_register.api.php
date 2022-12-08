<?php
require_once('../../models/subscription.class.php');
date_default_timezone_set("Asia/Karachi");

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$created_at = date("Y-m-d h:i:s");

$obj = new subscription();

$column = array(
    "username" => "$username",
    "email" => "$email",
    "password" => "$password",
    "created_at" => "$created_at",
);


if($obj->insertData('users', $column) !== false) {
	echo json_encode(array("status" => 'success'));
}
else{
    echo json_encode(array("status" => 'failed'));
}


?>
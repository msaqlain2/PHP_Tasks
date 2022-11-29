<?php
require_once('../models/subscription.class.php');


$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


$obj = new subscription();

$column = array(
    "username" => "$username",
    "email" => "$email",
    "password" => "$password",
);


if($obj->insertData('users', $column) != false) {
	echo json_encode(array("status" => 'success'));
}
else{
    echo json_encode(array("status" => 'failed'));
}


?>
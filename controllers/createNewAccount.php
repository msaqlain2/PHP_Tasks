<?php
require_once '../models/crud.class.php';

$full_name =  $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];

$user_object = new crud();

$insertData = $user_object->createNewAccount($full_name, $email, $password);

if ($insertData) {
	echo json_encode(array("statusCode"=>200));
} 
else {
	echo json_encode(array("statusCode"=>201));
}



<?php
require_once '../models/crud.class.php';

$full_name = $_POST['full_name'];
$user_email = $_POST['email'];
$user_password = $_POST['password'];


$user_object = new crud();

$user_object->setFullName($full_name);
$user_object->setUserEmail($user_email);
$user_object->setUserPassword($user_password);

$insertData = $user_object->createNewAccount();

if ($insertData) {
	echo json_encode(array("statusCode"=>200));
} 
else {
	echo json_encode(array("statusCode"=>201));
}



<?php 

require_once '../models/crud.class.php';

$id = $_POST['id'];
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];




$user_object = new crud;

$user_object->setUserId($id);
$user_object->setFullName($full_name);
$user_object->setUserEmail($email);
$user_object->setUserPassword($password);

$users_data = $user_object->UpdateUserData();

if($users_data) {
	echo json_encode(array("statusCode"=>200));
}
else{
	echo json_encode(array("statusCode"=>201));
}
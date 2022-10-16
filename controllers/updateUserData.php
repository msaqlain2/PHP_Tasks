<?php 

require_once '../models/crud.class.php';

$id = $_POST['uid'];
$full_name = $_POST['ufull_name'];
$email = $_POST['uemail'];
$password = $_POST['upassword'];

$user_object = new crud;

$users_data = $user_object->UpdateUserData($id, $full_name, $email, $password);

if($users_data) {
	echo json_encode(array("statusCode"=>200));
}
else{
	echo json_encode(array("statusCode"=>201));
}
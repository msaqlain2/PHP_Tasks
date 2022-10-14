<?php 

require_once '../models/crud.class.php';

$id = $_POST['id'];

$user_object = new crud;

$user_object->setUserId($id);

$users_data = $user_object->selectSpecificData();

if($users_data) {
	echo json_encode($users_data);
}
else{
	echo json_encode(array("statusCode"=>201));
}
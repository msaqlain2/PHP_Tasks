<?php 

require_once '../models/crud.class.php';

$user_object = new crud;
// $id = $_POST['id'];
$users_data = $user_object->deleteData($_POST['id']);

if($users_data) {
	echo json_encode(array("statusCode"=>200));
}
else{
	echo json_encode(array("statusCode"=>201));
}
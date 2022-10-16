<?php 

require_once '../models/crud.class.php';

$user_object = new crud;

$user_data = $user_object->selectDataById($_POST['id']);

$delete_data = $user_object->deleteData($_POST['id']);

if($delete_data) {
	echo json_encode(array("statusCode"=>200));
	unlink('../images/'.$user_data[0]['image']);
}
else{
	echo json_encode(array("statusCode"=>201));
}
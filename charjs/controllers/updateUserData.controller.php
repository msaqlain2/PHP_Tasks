<?php

require_once('../models/chart.class.php');

$id = $_POST['uid'];
$password = $_POST['upassword'];


$user_object = new chart();

$update_user = $user_object->UpdateUserData($id, $password);

if($update_user) {
	echo json_encode(array("statusCode"=>200));
}
else{
	echo json_encode(array("statusCode"=>201));
}
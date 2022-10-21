<?php

require_once('../models/chart.class.php');

$user_object = new chart();	
$email = $_POST['email'];
$password = $_POST['password'];



if(is_array($user_object->getUserDataByEmail($email)) && count($user_object->getUserDataByEmail($email)) > 0) {
	echo json_encode(array('statusCode' => 101));
}
else if($user_object->addNewUser($email, $password)) {
	echo json_encode(array('statusCode' => 200));
}
else{
	echo json_encode(array('statusCode' => 201));
}
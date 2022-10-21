<?php

session_start();
require_once('../models/chart.class.php');

$email = $_POST['email'];
$password = $_POST['password'];

$user_object = new chart();


if($user_object->userLogin($email, $password)) {
	echo json_encode(array("statusCode"=>200));
	$_SESSION['user_email'] = $email;
}
else if($user_object->adminLogin($email, $password)) {
	echo json_encode(array("statusCode"=>201));
	$_SESSION['admin_email'] = $email;
}
else{
	echo json_encode(array("statusCode"=>500));
}
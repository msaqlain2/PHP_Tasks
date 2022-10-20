<?php

require_once '../models/crud.class.php';


$full_name =  $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];

//Upload Image Script
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

$path = '../images/';

$image = $_FILES['image']['name'];

$tmp_image = $_FILES['image']['tmp_name'];

$extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

$final_image = rand(1000,1000000).$image;


if(in_array($extension, $valid_extensions)) 
{ 
	$path = $path.strtolower($final_image);
	move_uploaded_file($tmp_image, $path);

	$user_object = new crud();
	$insertData = $user_object->createNewAccount($full_name, $email, $password, $final_image);

	if ($insertData) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	
}
else{
	echo json_encode(array("statusCode"=>500));
}





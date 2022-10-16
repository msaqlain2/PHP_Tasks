<?php 

require_once '../models/crud.class.php';

$id = $_POST['uid'];
$full_name = $_POST['ufull_name'];
$email = $_POST['uemail'];
$password = $_POST['upassword'];
$old_image = $_POST['uoldimage'];
$new_image = $_FILES['unewimage']['name'];

if($new_image != '') {
	
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

	$path = '../images/';

	$image = $_FILES['unewimage']['name'];

	$tmp_image = $_FILES['unewimage']['tmp_name'];

	$extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

	$final_image = rand(1000,1000000).$image;

	if(in_array($extension, $valid_extensions)) { 

		$path = $path.strtolower($final_image);
		unlink('../images/'.$old_image);

		move_uploaded_file($tmp_image, $path);
	}
}
	if($new_image == ''){
		$path = $old_image;
	}
$user_object = new crud;

$users_data = $user_object->UpdateUserData($id, $full_name, $email, $password, $path);

if($users_data) {
	echo json_encode(array("statusCode"=>200));
}
else{
	echo json_encode(array("statusCode"=>201));
}
<?php

require_once('../models/chart.class.php');

$user_object = new chart;

$delete_data = $user_object->deleteUserData($_POST['id']);

if($delete_data) {
	echo json_encode(array("statusCode"=>200));
}
else{
	echo json_encode(array("statusCode"=>201));
}
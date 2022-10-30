<?php

require_once('../../models/task.class.php');

$category_name = $_POST['category_name'];
$obj = new task();
$insert = $obj->addNewTemple($category_name);

if($insert){
	echo json_encode(array('StatusCode'=>200));
}
else{
	echo json_encode(array('StatusCode'=>201));	
}

<?php

require_once('../../models/task.class.php');

$category_name = $_POST['category_name'];
$obj = new task();

if($obj->addNewMaterialType($category_name)){
	echo json_encode(array('Data Already Exist'=>200));
}
else if(is_array($obj->checkMaterialTypeData($category_name)) && count($obj->checkMaterialTypeData($category_name)) > 0 ){
	echo json_encode(array('StatusCode'=>201));	
}
else{
	echo json_encode(array('StatusCode'=>202));
}



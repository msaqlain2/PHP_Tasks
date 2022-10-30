<?php

require_once('../../models/task.class.php');

$category_name = $_POST['category_name'];

$obj = new task();


if(is_array($obj->checkPartorCrownData($category_name)) && count($obj->checkPartorCrownData($category_name)) > 0 ){
	echo json_encode(array('Data Already Exist'=>200));
}
else if($obj->addNewPartOrCrown($category_name)){
	echo json_encode(array('StatusCode'=>201));
}
else{
	echo json_encode(array('StatusCode'=>202));	
}



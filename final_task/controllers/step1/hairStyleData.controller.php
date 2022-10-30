<?php


require_once('../../models/task.class.php');

$part_side = $_POST['part_side'];
$volume = $_POST['volume'];
$partorcrown = $_POST['partorcrown'];
$material_type = $_POST['material_type'];


$obj = new task();
$insert = $obj->HairStyleData($part_side, $volume, $partorcrown, $material_type);

if($insert){
	echo json_encode(array('StatusCode'=>200));
}
else{
	echo json_encode(array('StatusCode'=>201));	
}

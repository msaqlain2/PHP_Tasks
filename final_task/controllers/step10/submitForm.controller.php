<?php
require_once('../../models/task.class.php');

$front = $_POST['front'];
$top = $_POST['top'];
$left_temp = $_POST['left_temp'];
$right_temp = $_POST['right_temp'];
$left_side = $_POST['left_side'];
$right_side = $_POST['right_side'];
$crown = $_POST['crown'];
$back = $_POST['back'];


$part_side = $_POST['part_side'];
$volume = $_POST['volume'];
$partorcrown = $_POST['partorcrown'];
$material_type = $_POST['material_type'];

$obj = new task();

$step_1 = $obj->selectHairColor($front, $top, $left_temp, $right_temp, $left_side, $right_side, $crown, $back);
$step_2 = $obj->HairStyleData($part_side, $volume, $partorcrown, $material_type);

if($step_1 && $step_2){
	echo json_encode(array('StatusCode'=>200));
}
else{
	echo json_encode(array('StatusCode'=>201));	
}

<?php 

require_once '../models/crud.class.php';

$user_object = new crud;

$user_object->setUserId($_GET['id']);

$users_data = $user_object->selectSpecificData();
print_r($users_data);

?>

<?php 

require_once '../models/crud.class.php';

$user_object = new crud;

$users_data = $user_object->showAllData();
echo json_encode($users_data);

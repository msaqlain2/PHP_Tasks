<?php 
session_start();
require_once('../../models/subscription.class.php');

$obj = new subscription();
$card_id = $_POST['card_id'];
$column = array(
	"id" => "$card_id"
);


echo json_encode($obj->selectData('users_cards', $column));
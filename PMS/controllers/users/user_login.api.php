<?php
session_start();

require_once('../../models/subscription.class.php');

$email = $_POST['email'];
$password = $_POST['password'];


$obj = new subscription();
$obj->login($email, $password);

?>
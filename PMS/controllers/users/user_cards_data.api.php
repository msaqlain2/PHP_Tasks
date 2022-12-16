<?php
session_start();

require_once('../../models/subscription.class.php');

$id = $_SESSION['userId'];

$obj = new subscription();
echo json_encode($obj->getUserCards($id));


?>
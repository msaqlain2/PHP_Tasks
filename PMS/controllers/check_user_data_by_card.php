<?php

require_once('../models/subscription.class.php'); 
$user_card = $_POST['cardNumber'];
// $user_card = "**** **** **** 4242";
$obj = new subscription();
echo json_encode($obj->checkUserDataByCard($user_card));
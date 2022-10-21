<?php

session_start();
	require('../models/chart.class.php');

	unset($_SESSION['user_email']);
	unset($_SESSION['admin_email']);

	session_destroy();

	echo json_encode(['statusCode' => 200]);

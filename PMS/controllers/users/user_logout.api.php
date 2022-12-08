<?php 

session_start();
session_destroy();
if($_SESSION['userId'] != null) {

	echo json_encode(array('status' => 'logout'));

}



?>
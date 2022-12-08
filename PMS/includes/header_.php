<?php session_start(); 
if(isset($_SESSION['userEmail']) == true && isset($_SESSION['userId']) == true) {
	header("Location: card_details.php");
}
else{
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
	<link rel="stylesheet" href="assets/bootstrap/dist/css/custom_styles.css">
</head>
<body>
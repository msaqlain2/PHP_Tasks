<?php 
session_start();
if(isset($_SESSION['userEmail']) == null && isset($_SESSION['userId']) == null) {
  header("Location: login.php");
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
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
	<link rel="stylesheet" href="assets/bootstrap/dist/css/custom_styles.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Profile Management System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="card_details.php">Subscribe</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="invoices.php">Invoices</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
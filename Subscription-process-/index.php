<?php
session_start(); 
if(isset($_SESSION['userEmail']) == true && isset($_SESSION['userId']) == true) {
	header("Location: card_details.php");
}
else{
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  </head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-4 col-md-4">
			
		</div>
		<div class="col-sm-4 col-md-4">
			<form method="post" id='reg_form'>
				<h1 class="mt-5">Registration Form</h1>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" id="username" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" id="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" id="password" class="form-control" required>
				</div>
				<p class="text-center text-success" id="success"></p>
				<div class="form-group mt-3">
					<input type="submit" value="Register" class="btn btn-success">
				</div>
				<p class='text-center'>Already a member? <a href="login.php" class="text-decoration-none">Login</a> </p>

			</form>	
		</div>
	</div>
</div>

<?php include('includes/footer.inc.php') ?>
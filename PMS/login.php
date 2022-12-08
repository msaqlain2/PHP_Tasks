<?php include 'includes/header_.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-sm-4 col-md-4">
			
		</div>
		<div class="col-sm-4 col-md-4">
			<form method="post" id='login_form'>
				<h1 class="mt-5">Login Form</h1>
				
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" id="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" id="password" class="form-control" required>
				</div>
				<div class="form-group mt-3">
					<input type="submit"  value="Login" class="btn btn-primary">
				</div>
				<p class='text-center'>Not a member? <a href="index.php" class="text-decoration-none">Register</a> </p>
				<p class="text-danger text-center" id="error"></p>
			</form>	
		</div>
	</div>
</div>
<?php include 'includes/footer.inc.php'; ?>
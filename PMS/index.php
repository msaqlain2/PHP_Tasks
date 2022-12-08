<?php include 'includes/header_.php'; ?>

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

<?php include 'includes/footer.inc.php'; ?>


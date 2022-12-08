<?php include('includes/header.inc.php');  ?>

<div class="container">
	<div class="row">
		<div class="col-sm-2 col-md-2"></div>
		<div class="col-sm-8 col-md-8">
			<div class="card mt-5">
				<div class="card-header">
					<div class="d-flex justify-content-between">
						<h4 class="p-2">Confirm Payment</h4>
						<div class="ml-auto p-2">
							<button type="button" class="btn btn-danger" id="logout">Logout</button>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="post" id="payment_form" class="payment_form">
						<input type="hidden" class="form-control" id="subs_id">
						<div class="row mt-3">
							<div class="col-sm-6 col-md-6">
								<label>Select Card</label>
								<select class="form-control" id="user_cards" name="card" required>
									<option value="" selected disabled>Select Card</option>
								</select>
							</div>
							<div class="col-sm-6 col-md-6">
								<label>Select Plan</label>
								<select class="form-control" name="plan" required>
									<option value="" selected disabled>Select Plan</option>
									<option value="Basic">Basic -- $2/mo</option>
									<option value="Pro">Pro -- $10/mo</option>
									<option value="Enterprise">Enterprise -- $30/mo</option>
								</select>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-sm-12 col-md-12">
								<img src="assets/images/MasterCard_Logo.svg.png" class="img-responsive" height="30" >
								<img src="assets/images/visa-card-logo-9.png" class="img-responsive" height="20">
							</div>
							<div class="col-sm-2">
								
							</div>
						</div>
						<p class="text-danger mt-2 text-center"></p>
						<div class="row mt-3">
							<div class="d-grid gap-2">
							  <button class="btn btn-primary" type="submit" id="order_btn">Confirm Pay</button>
							</div>
						</div>
						<p class="text-center text-primary fw-bold" id="subs_live"></p>
						<p class="text-center text-danger fw-bold" id="subs_expire"></p>

						<p id="error" class="text-center text-danger"></p>
						<p id="success" class="text-center text-success"></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<?php include('includes/footer.inc.php')  ?>
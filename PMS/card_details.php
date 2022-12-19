<?php include('includes/header.inc.php');  

?>

<div class="container">
	<div class="row">

		<div class="col-sm-2 col-md-2"></div>
		<div class="col-sm-8 col-md-8">
			<div class="card mt-5">
				<div class="card-header">

					<div class="d-flex justify-content-between">
						<h4 class="p-2">Pay with Card</h4>
						<div class="ml-auto p-2">
							<button type="button" class="btn btn-danger" id="logout">Logout</button>
						</div>
					</div>
				</div>
				<div class="card-body">
					<p class="text-center text-danger fw-bold" id="subs_expire"></p>
					<p class="text-center text-danger fw-bold" id="planMsg"></p>

					<form method="post" id="previousCardsFrom" class="previousCardsFrom">
						<div class="re-subscribe">
							<div class="form-group">
								<label>You can also subscribe with previous card</label>
								<select class="form-control" name="previous_cards"  id="previous_cards">
									<option value="" selected >Select Card</option>
								</select>
							</div>
							<div class="row mt-3">
								<div class="d-grid gap-2">
								  <button class="btn btn-primary mt-3" type="submit" 
								  id="submitPreviousForm" onclick="stripeRePay(event);">Pay</button>
								</div>
							</div>
						</div>
					</form>
					
					<form method="post" id="payment_form" class="payment_form">
						<input type="hidden" class="form-control" name="plan" id="plan" value="<?php  echo $_GET['plan'] ?>" required>
						<input type="hidden" name="cc-brand" class="form-control cc-brand" id="cc-brand" required>
						<div class="row">
							<div class="col-sm-12 col-md-12">
								<div class="form-group ">
									<label>Email Address</label>
									<input type="email" name="cc-email"  class="form-control cc-email" required>
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-sm-12 col-md-12">
								<div class="form-group">
									<h6>Card Information</h6>
									
									<input type="text" name="cc-number" class="form-control cc-number" placeholder="•••• •••• •••• ••••" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="cc-expiry" class="form-control cc-expiry mt-1" placeholder="MM / YY" required>
								</div>
							</div>
							<div class="col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="cc-cvc" class="form-control cc-cvc mt-1" placeholder="CVC" required>
								</div>
							</div>
						</div>
						<ul style="list-style:none;padding-left: 0px;" class="mt-2">
							<li class="text-danger errorCardNumber"  style="font-size:14px"></li>
						</ul>
						

						<div class="row mt-3">	
							<div class="col-sm-12 col-md-12">
								<div class="form-group">
									<label>Name on Card</label>
									<input type="text" name="cc-owner" class="form-control cc-owner">
								</div>
							</div>
						</div>

					<p id="success" class="text-center text-success mt-3"></p>
						<div class="row mt-3">
							<div class="d-grid gap-2">
							  <button class="btn btn-primary mt-3" type="submit" 
							  id="submitPaymentForm" onclick="stripePay(event);">Pay</button>
							</div>
						</div>
					</form>
					<p class="text-center text-primary fw-bold" id="subs_live"></p>
					

					<p id="error" class="text-center text-danger"></p>

					<p id="message" class="text-danger text-center"></p>
				</div>
			</div>
		</div>
	</div>
</div>


<?php include('includes/footer.inc.php')  ?>
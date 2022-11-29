<?php include('includes/header.inc.php');  
// echo $_SESSION['userId'];
?>

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
						<div class="row">
							<div class="col-sm-8 col-md-8">
								<div class="form-group">
									<label>Card Owner</label>
									<input type="" name="card_owner" class="form-control" required>
								</div>		
							</div>
							<div class="col-sm-4 col-md-4">
								<div class="form-group">
									<label>CVV</label>
									<input type="" name="cvv" class="form-control" required>
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-sm-12 col-md-12">
								<label>Card Number</label>
								<input type="" name="card_number" class="form-control" required>
							</div>
						</div>
						<div class="row mt-3">
							<label>Expiry Date</label>
							<div class="row">
								<div class="col-sm-4 col-md-4">
									<select class="form-control" name="month" required>
										<option value="" selected disabled>Select Month</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
									</select>	
								</div>
								<div class="col-sm-4 col-md-4">
									<select class="form-control" name="year" required>
										<option value="" selected disabled>Select Year</option>
									    <option value="2022">2022</option>
									    <option value="2023">2023</option>
									    <option value="2024">2024</option>
									    <option value="2025">2025</option>
									    <option value="2026">2026</option>
									    <option value="2027">2027</option>
									    <option value="2028">2028</option>
									    <option value="2029">2029</option>
									    <option value="2030">2030</option>
									    <option value="2031">2031</option>
									    <option value="2032">2032</option>
									    <option value="2033">2033</option>
									    <option value="2034">2034</option>
									    <option value="2035">2035</option>
									    <option value="2036">2036</option>
									    <option value="2037">2037</option>
									    <option value="2038">2038</option>
									    <option value="2039">2039</option>
									    <option value="2040">2040</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-sm-4 col-md-4">
								<label>Select Plan</label>
								<select class="form-control" name="plans" required>
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
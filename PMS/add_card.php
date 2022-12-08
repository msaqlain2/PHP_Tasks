<?php 
include 'includes/header.inc.php'; 
include 'models/subscription.class.php'; 
$obj = new subscription();
$results = $obj->editCards($_SESSION['userId']);?>
<div class="container">
	<div class="card mt-5">
		<div class="card-header bg-primary">
			<div class="d-flex justify-content-between">
				<div class="p-2"><h4 class="text-light">Card Info</h4></div>
			  	<div class="p-2"><button class="btn btn-dark" onclick="addCreditRow()">Add New Card <i class="la la-plus"></i></button></div>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-bordered">
            <thead>
            <tr>
                <th>Card Number</th>
                <th>Card Holder Name</th>
                <th>Card Expiry</th>
                <th>CVV</th>
            </tr>
            </thead>
            <tbody id="addCreditRowT">
        		
		</form>
            </tbody>
        </table>
		</div>
		<div class="card-footer">
			<form novalidate autocomplete="on" method="POST" id="addNewCard">
				<div class="d-flex justify-content-between">
					<div class="p-2"><h4 class="text-light"></h4></div>
				  	<div class="p-2"><button class="btn btn-dark">Reset <i class="la la-refresh"></i></button>
				  	<button type="submit" id="addCard" class="btn btn-success" name="info">Save Card Info <i class="la la-save"></i></button>
				  	</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php include 'includes/footer.inc.php'; ?>
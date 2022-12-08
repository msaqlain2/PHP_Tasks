<?php 
include 'includes/header.inc.php'; 
include 'models/subscription.class.php'; 
$obj = new subscription();?>
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
            <?php $results = $obj->getUserCards($_SESSION['userId']); 
            foreach($results as $data) :
            ?>
            <tr>
            	<tr class="cardInfo">
    		<input id="cc-id" type="hidden" class="input-lg form-control cc-id" autocomplete="cc-id" value="<?= $data['id']; ?>">
	        <input id="cc-brand" type="hidden" class="input-lg form-control cc-brand" autocomplete="cc-brand" value="<?= $data['card_type']; ?>">
		<td>
			<div class="form-group">
		        <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required value="<?= $data['card_number']; ?>">
	      	</div>
		</td>
		<td>
			<div class="form-group">
			    <input id="cc-owner" type="tel" class="input-lg form-control" autocomplete="off" placeholder="John Smith" required value="<?= $data['card_holder_name']; ?>">
	      </div>
		</td>
		
		<td>
			<div class="form-group">
		        <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••" required value="<?= $data['card_expiry_date']; ?>">
		    </div>
		</td>
		
		<td>
			<div class="form-group">
			    <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="•••" required value="<?= $data['cvv']; ?>">
	      </div>
		</td>

		<td>
			<button class="btn btn-danger" onclick="$(this).parent().parent().remove()"><i class="la la-times"></i>
			</button>
		</td>
		</tr>
            </tr>
        <?php endforeach; ?>
			
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
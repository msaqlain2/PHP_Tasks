

<div class="modal fade" id="editCardModal" tabindex="-1" aria-labelledby="#editCardModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Card Info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="" id="editCardForm">
        	<input id="cc-id" type="" class="input-lg form-control cc-id" autocomplete="cc-id" >
        	<input id="cc-brand" type="" class="input-lg form-control cc-brand" autocomplete="cc-brand" >
        	<div class="form-group">
	        	<label>Card Number</label>
	        	<input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required>
        	</div>
        	<div class="form-group mt-2">
	        	<label>Card Holder Name</label>
	        	<input id="cc-owner" type="tel" class="input-lg form-control" autocomplete="off" placeholder="John Smith" required>
        	</div>
        	<div class="form-group mt-2">
	        	<label>Card Expiry</label>
	        	<input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••" required>
        	</div>
        	<div class="form-group mt-2">
	        	<label>Card CVV</label>
	        	<input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="•••" required>
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript" src="assets/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="assets/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="assets/jquery/dist/jquery.payment.js"></script>
<script type="text/javascript" src="assets/jquery/dist/jquery.creditCardValidator.js"></script>
<script type="text/javascript" src="assets/bootstrap/dist/js/bootstrap.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-creditcardvalidator/1.0.0/jquery.creditCardValidator.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
</html>
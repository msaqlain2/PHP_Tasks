$(document).ready(function() {
	$('#subs_id').val('0');

	checkUserDataById();
	
	$('#reg_form').submit(function(e) {
		e.preventDefault();
		 var formdata = new FormData(this);
		$.ajax({
			url: 'controllers/users/user_register.api.php',
			type: 'POST',
			data: formdata,
			processData: false,
		    contentType: false,
		    dataType: 'json',
			success: function(data) {
				if(data.status = 'success') {
					$("#success").show();
                    $('#success').html('Account Created Successfully, Please Login!');
                    $('#reg_form')[0].reset();
                    $('#success').fadeOut(10000);	
				}
			}
		});
	});

	$('#login_form').submit(function(e) {
		e.preventDefault();
		 var formdata = new FormData(this);
		$.ajax({
			url: 'controllers/users/user_login.api.php',
			type: 'POST',
			data: formdata,
			processData: false,
		    contentType: false,
		    dataType: 'json',
			success: function(data) {
				if(data.status === 'success') {
					window.location.href = 'card_details.php';			
				}
				else if(data.status === 'failed'){
					$("#error").show();
                    $('#error').html('Invalid Credentails');
                    $('#error').fadeOut(2000);
				}
			}
		});
	});

	$('#logout').click(function() {
		$.ajax({
			url: 'controllers/users/user_logout.api.php',
			type: 'POST',
			processData: false,
		    contentType: false,
		    dataType: 'json',
			success: function(data) {
				if(data.status === 'logout') {
					window.location.href = 'index.php';			
				}
			}
		});
	});

	$('#addCard').click(function(e) {
		e.preventDefault();
		cardValidate();

		var cci=[];
    $('#addCreditRowT .input-lg').each(function(key, element){
        cci.push($(element).val());
    });
		if(cci.length > 0) {
			var form_cc = new FormData();
			form_cc.append('cci',cci);
			$.ajax({
				url:  'controllers/cards/add_new_card.api.php',
				type: 'POST',
				data: form_cc,
        processData: false,
      	contentType: false,
        success:function(response) {
    		console.log(response);	
        }
			});
		}
	});


	$(document).on('click', '#updateCardData', function() {
		$('#cc-id').val($(this).data('id'));
		$('#cc-brand').val($(this).data('type'));
		$('#cc-number').val($(this).data('number'));
		$('#cc-owner').val($(this).data('owner'));
		$('#cc-exp').val($(this).data('expiry'));
		$('#cc-cvc').val($(this).data('cvv'));

	});	

	$.ajax({
    url: 'controllers/users/user_cards_data.api.php',
    type:'POST',
    dataType: 'json',
    success: function(data) {
        for (var i=0; i<data.length; i++) {
            
             $('#user_cards').append($('<option>', { 
             value: data[i].card_number,
              text : data[i].card_number 
    }));
        }
    },
    
});

});


function checkUserDataById() {
	$.ajax({
		url: 'controllers/users/check_user_data.api.php',
		type: 'POST',
		processData: false,
	    contentType: false,
	    dataType: 'json',
	    success: function(data) {
	    	if(data.status == 'Subscription Expired') {
	    		$('#subs_id').val('1');
	    		$('#subs_expire').html("Your subscription has expired!");
	    	}
	    	if(data.status == 'Data Already Exist!') {
	    		$('#order_btn').remove();
	    		$('#subs_live').html("Your subscription is Live");
	    	}
	    }
	});

	if($('#subs_id').val() == 0) {
		$('#payment_form').submit(function(e) {
			e.preventDefault();
			 var formdata = new FormData(this);
			$.ajax({
				url: 'controllers/complete_order.api.php',
				type: 'POST',
				data: formdata,
				processData: false,
		    contentType: false,
		    dataType: 'json',
				success: function(data) {
					if(data.status == 'success') {
						$("#success").show();
	                    $('#success').html('Data Inserted Successfully!');
	                    $('#payment_form')[0].reset();
	                    $('#success').fadeOut(2000);
	                    checkUserDataById();
					}
					else if(data.status == 'failed'){
						$("#error").show();
	                    $('#error').html('Something went wrong!');
	                    $('#error').fadeOut(2000);
					}
				}
			});
		});
	}


	if($('#subs_id').val() == 1) {
		$('#payment_form').submit(function(e) {
			e.preventDefault();
			var formdata = new FormData(this);
			$.ajax({
				url: 'controllers/renewal_subscription.api.php',
				type: 'POST',
			    data: formdata,
				processData: false,
			    contentType: false,
			    dataType: 'json',
			    success: function(data) {
			    	if(data.status == 'Re-Subscribed Successfully!') {
			    		console.log("Re-Subscribed Successfully");
			    	}
			    	if(data.status == 'Something went wrong!'){
			    		console.log("Re-Subscribed Successfully");
			    	}	
			    }	
			});
		});
	}
}

function addCreditRow() {

	$("#addCreditRowT").append(
		`
		<tr class="cardInfo">
	        <input id="cc-brand" type="hidden" class="input-lg form-control cc-brand" autocomplete="cc-brand" >
		<td>
			<div class="form-group">
		        <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required>
	      	</div>
		</td>
		<td>
			<div class="form-group">
			    <input id="cc-owner" type="tel" class="input-lg form-control" autocomplete="off" placeholder="John Smith" required>
	      </div>
		</td>
		
		<td>
			<div class="form-group">
		        <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••" required>
		    </div>
		</td>
		
		<td>
			<div class="form-group">
			    <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="•••" required>
	      </div>
		</td>

		<td>
			<button class="btn btn-danger" onclick="$(this).parent().parent().remove()"><i class="la la-times"></i>
			</button>
		</td>
		</tr>`
	);
    cardValidate();
}

function cardValidate() {
	jQuery(function($) {
      $('.cc-number').payment('formatCardNumber');
      $('.cc-exp').payment('formatCardExpiry');
      $('.cc-cvc').payment('formatCardCVC');

      $.fn.toggleInputError = function(erred) {
        this.parent('.form-group').toggleClass('has-error', erred);
        return this;
      };

	    var cardType = $.payment.cardType($('.cc-number').val());
	    $('.cc-number').toggleInputError(!$.payment.validateCardNumber($('.cc-number').val()));
	    $('.cc-exp').toggleInputError(!$.payment.validateCardExpiry($('.cc-exp').payment('cardExpiryVal')));
	    $('.cc-cvc').toggleInputError(!$.payment.validateCardCVC($('.cc-cvc').val(), cardType));
	    $('.cc-brand').text(cardType);


	    $('.validation').removeClass('text-danger text-success');
	    $('.validation').addClass($('.has-error').length ? 'text-danger' : 'text-success');
	    
	    $('.cc-number').on('input',function(e){
		    var $classOfBtn = $('#cc-number').attr('class').split(' ')[3];
		    $('.cc-brand').val($classOfBtn);
		});
    });
}

	

function editCardInfo() {
	cardValidate();
	
}


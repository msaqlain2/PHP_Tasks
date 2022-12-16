$(document).ready(function() {

	cardValidate();
	checkUserDataById();

	$('.re-subscribe').hide();
	$('#submitPreviousForm').hide();

	$('#previous_cards').change(function(e) {
		var cardDropDown = $(this).val();
		if(cardDropDown !== ''){
			$('#payment_form').hide();
			$('#submitPreviousForm').show();
			
		}
		else{
			$('#payment_form').show();
			$('#submitPreviousForm').hide();
		}
	});

	
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
					window.location.href = 'select_plans.php';			
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

	$.ajax({
    url: 'controllers/users/user_cards_data.api.php',
    type:'POST',
    dataType: 'json',
    success: function(data) {
        for (var i=0; i<data.length; i++) {
            
             $('#previous_cards').append($('<option>', { 
             value: data[i].card_number,
              text : data[i].card_number + " -- " + data[i].card_type, 
    }));
        }
    },
    
});


		$('#payment_form').submit(function(e) {
			e.preventDefault();
			let formdata = new FormData(this);
			
			$.ajax({
				url: 'controllers/process.php',
				type: 'POST',
				data: formdata,
				processData: false,
			    contentType: false,
			    dataType: 'json',
				success: function(data) {
					if(data.status == 'success') {
						$("#success").show();
	                    $('#success').html('Subscribed Successfully!');
	                    $('#payment_form')[0].reset();
	                    $('#success').fadeOut(2000);
	                    $('#subs_expire').remove();
	                    $('.re-subscribe').hide();
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

});



function formValidate() {
		let validCard = 0;
		let valid = false;
		let cardCVC = $('.cc-cvc').val();
		let cardNumber = $('.cc-number').val();
		let customerName = $('.cc-owner').val();
		let expiryDate = $('.cc-expiry').val();
		let cardExpMonth = expiryDate.slice(0,2);
		let cardExpYear = expiryDate.slice(5,0);
		let validateMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
		let validateYear = /^2017|2018|2019|2020|2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031$/;
		let validateName = /^[a-z ,.'-]+$/i;
		let cvv_expression = /^[0-9]{3,4}$/;

		 
		 	$('.cc-number').validateCreditCard(function(result){
		  		if(result.valid == true) {
		   			$('.cc-number').removeClass('require');
		   			$('.cc-number').removeClass('border-danger');
		   			$('.errorCardNumber').text('');
			   		validCard = true;
		  		} 
		  		else {
		   			$('.cc-number').addClass('require');
		   			$('.cc-number').addClass('border-danger');
		   			$('.errorCardNumber').text('Invalid Card Number');
		   			validCard = false;
		  		}		
		 	});	



		 return validCard;
	}

Stripe.setPublishableKey('pk_test_51MDBgwBkuRJujNxoTFqi9RebiiEBsl4tyBNdq6MS8XUKsOra6uNHg3srygo51f8RgZSt0QKoXLutOtM6Fqgsh6bs001wkgqgiF');

	function stripePay(event) {
	    event.preventDefault();

	    let expiryDate = $('.cc-expiry').val();
	    let expiryMonth = expiryDate.slice(0,2);
	    let expiryYear = expiryDate.slice(5,);
	    let cardOwner = $('.cc-owner').val();
	    if(formValidate() == true) {
	     $('#submitPaymentForm').attr('disabled', 'disabled');
	     $('#submitPaymentForm').text('Payment Processing....');
	     Stripe.createToken({
	      number:$('.cc-number').val(),
	      cvc:$('.cc-cvc').val(),
	      exp_month : expiryMonth, 
	      exp_year : expiryYear,
	      name : cardOwner
	     }, stripeResponseHandler);
	     return false;
	    }
	}



function stripeResponseHandler(status, response) {
 if(response.error) {
  $('#submitPaymentForm').attr('disabled', false);
  $('#message').html(response.error.message).show();
  
 } else {
  var stripeToken = response['id'];
  $('#payment_form').append("<input type='hidden' name='stripeToken' value='" + stripeToken + "' />");
  $('#payment_form').submit();
 }
}



function stripeRePay(event) {
    event.preventDefault();
    let prevCard = $('#previous_cards').val();
    if(prevCard !== '') {
     $('#submitPreviousForm').attr('disabled', 'disabled');
     $('#submitPreviousForm').text('Payment Processing....');
     $.ajax({
     	type: "POST",
     	url : 'controllers/check_user_data_by_card.php',
     	data : {"cardNumber" : prevCard},
     	success: function(response){
     		let sampleData = response;
		 	let cardStr = JSON.parse(sampleData);
		 	let expiry = cardStr[0].card_expiry_date;
     		Stripe.createToken({
		      number:cardStr[0].card_number,
		      cvc:cardStr[0].cvc,
		      exp_month : expiry.slice(0,2), 
		      exp_year : expiry.slice(5),
		      name : cardStr[0].card_holder_name
		    }, stripeReResponseHandler);	
     	}
    });
    	return false;
    }
}

function stripeReResponseHandler(status, response) {
 if(response.error) {
  $('#submitPreviousForm').attr('disabled', false);
  $('#message').html(response.error.message).show();
  
 } else {
  var stripeToken = response['id'];
  $('#previousCardsFrom').append("<input type='hidden' name='stripeToken' value='" + stripeToken + "' />");
  $('#previousCardsFrom').submit();
 }
}

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
	    		$('.re-subscribe').show();
	    	}
	    	if(data.status == 'Data Already Exist!') {
	    		$('#submitPaymentForm').remove();
	    		$('#payment_form').remove();
	    		$('#subs_live').html("Your subscription is Live");

	    	}
	    }
	});

		

		$('#previousCardsFrom').submit(function(e) {
			e.preventDefault();
			var formdata = new FormData(this);
			$.ajax({
				url: 'controllers/renewal_subscription_using_previous_card.api.php',
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

function cardValidate() {
	jQuery(function($) {
      $('.cc-number').payment('formatCardNumber');
      $('.cc-expiry').payment('formatCardExpiry');
      $('.cc-cvc').payment('formatCardCVC');

	    $('.cc-number').on('input',function(e){
		    var $classOfBtn = $('.cc-number').attr('class').split(' ')[3];
		    $('.cc-brand').val($classOfBtn);
		});
	});	
}
	






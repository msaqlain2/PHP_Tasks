$(document).ready(function() {
	$('#subs_id').val('0');

	checkUserDataById();
	
	$('#reg_form').submit(function(e) {
		e.preventDefault();
		 var formdata = new FormData(this);
		$.ajax({
			url: 'controllers/user_register.api.php',
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
			url: 'controllers/user_login.api.php',
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
			url: 'controllers/user_logout.api.php',
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

});


function checkUserDataById() {
	$.ajax({
		url: 'controllers/check_user_data.api.php',
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
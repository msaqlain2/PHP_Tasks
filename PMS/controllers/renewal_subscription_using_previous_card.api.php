<?php
session_start();

date_default_timezone_set("Asia/Karachi");
require_once('../models/subscription.class.php');
require_once('../stripe-php/init.php'); 
$obj = new subscription();
$stripeToken = $_POST['stripeToken'];
$id = $_SESSION['userId'];
$card_number = $_POST['previous_cards'];
$paymentDate = date('Y-m-d');
$subs_expiry_date =  date('Y-m-d',strtotime('+30 days',strtotime(str_replace('/', '-', $paymentDate))));
$subs_plan = 0;
$card_subs_status = "Charged";

$stripe = array(
      "secret_key" => "sk_test_51MDBgwBkuRJujNxo6C7DmQBpxCSrAqnZxE2AKyHRMGMQMue1mUChHwzhyHO9gxgnZHXlRSWIHc5we1SEe1YW7wmg00ydRfvcYg",
      "publishable_key" => "pk_test_51MDBgwBkuRJujNxoTFqi9RebiiEBsl4tyBNdq6MS8XUKsOra6uNHg3srygo51f8RgZSt0QKoXLutOtM6Fqgsh6bs001wkgqgiF"
    );    
	

\Stripe\Stripe::setApiKey($stripe['secret_key']);  

$users = $obj->checkUserDataByCard($card_number);
foreach($users as $user) {
	 
}
$customer = \Stripe\Customer::create(array(
		'name' => $user['card_holder_name'],
	      // 'email' => $email,
        	'source'  => $stripeToken
		    )); 
	
	$totalAmount = '500';
	$currency = 'usd';
	$orderNumber = rand(100,100000);   
    
    // details for which payment performed
    $payDetails = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $totalAmount,
        'currency' => $currency,
        'metadata' => array(
            'order_id' => $orderNumber
        )
    ));   


    // get payment details
    $paymenyResponse = $payDetails->jsonSerialize();
	
    // check whether the payment is successful
    if($paymenyResponse['amount_refunded'] == 0 && empty($paymenyResponse['failure_code']) && $paymenyResponse['paid'] == 1 && $paymenyResponse['captured'] == 1){
        
		// transaction details 
        $amountPaid = $paymenyResponse['amount'];
        $balanceTransaction = $paymenyResponse['balance_transaction'];
        $paidCurrency = $paymenyResponse['currency'];
        $paymentStatus = $paymenyResponse['status'];
        
      
    	
    	$obj->reSubscribeUsingPreviousCard($id, $card_number, $paymentDate, $subs_expiry_date, $stripeToken, $subs_plan, $card_subs_status);

	   //if order inserted successfully
       if($paymentStatus == 'succeeded'){
            // echo $paymentMessage = "The payment was successful. Order ID: {$orderNumber}";
       } else{
          echo $paymentMessage = "failed";
       }
	   
    } else{
        echo $paymentMessage = "failed";
    }






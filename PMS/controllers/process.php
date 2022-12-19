<?php 
session_start();
date_default_timezone_set("Asia/Karachi");
require_once('../models/subscription.class.php'); 
require_once('../stripe-php/init.php'); 
$id = $_SESSION['userId'];
$plan = $_POST['plan'];
$obj = new subscription();
$data = $obj->getUsers($id);
$totalAmount = 0;
$email = $data[0]['email'];
$stripeToken = $_POST['stripeToken'];
 
$cardNumber = $_POST['cc-number'];
$cardType = $_POST['cc-brand'];
$cardOwner = $_POST['cc-owner'];
$cardExpiry = $_POST['cc-expiry'];
$paymentDate = date("Y-m-d");
$subscriptionPlan = $plan;
$subsExpiryDate =  date('Y-m-d',strtotime('+30 days',strtotime(str_replace('/', '-', $paymentDate))));
$cardSubsStatus = "Charged";



$stripe = array(
      "secret_key" => "sk_test_51MDBgwBkuRJujNxo6C7DmQBpxCSrAqnZxE2AKyHRMGMQMue1mUChHwzhyHO9gxgnZHXlRSWIHc5we1SEe1YW7wmg00ydRfvcYg",
      "publishable_key" => "pk_test_51MDBgwBkuRJujNxoTFqi9RebiiEBsl4tyBNdq6MS8XUKsOra6uNHg3srygo51f8RgZSt0QKoXLutOtM6Fqgsh6bs001wkgqgiF"
    );    
	

\Stripe\Stripe::setApiKey($stripe['secret_key']);  


$customer = \Stripe\Customer::create(array(
		'name' => $cardOwner,
	      'email' => $email,
        	'source'  => $stripeToken
		    )); 
	if($subscriptionPlan === 'basic'){
        $totalAmount = '500';
    }
    else if($subscriptionPlan === 'pro') {
         $totalAmount = '1500';   
    }
    else if($subscriptionPlan === 'enterprise') {
         $totalAmount = '2900';   
    }

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
        
      
    	
    	$obj->subscribe($id, $cardNumber, $cardType, $cardOwner, $cardExpiry, $stripeToken, 
            $subscriptionPlan, $paymentDate, $amountPaid, $paidCurrency, $paymentStatus, 
            $subsExpiryDate, $cardSubsStatus);

	   //if order inserted successfully
       if($paymentStatus == 'succeeded'){
            // echo $paymentMessage = "The payment was successful. Order ID: {$orderNumber}";
       } else{
          echo $paymentMessage = "failed";
       }
	   
    } else{
        echo $paymentMessage = "failed";
    }


?>
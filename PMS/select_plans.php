<?php 
include 'includes/header.inc.php'; 
include 'models/subscription.class.php';
$id = $_SESSION['userId'];
$obj = new subscription();
$user_data = $obj->subsDataByUserId($id);
if($user_data['payment_date'] < $user_data['subs_expiry_date']){
	header('location: card_details.php');
}

?>


	<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Pricing</h1>
    </div>

    <div class="container">
      <div class="card-deck mb-3 text-center">
      	<div class="row">
      		<div class="col-sm-4 col-md-4">
		        <div class="card mb-4 box-shadow">
		          <div class="card-header">
		            <h4 class="my-0 font-weight-normal">Basic</h4>
		          </div>
		          <div class="card-body">
		            <h1 class="card-title pricing-card-title">$5 <small class="text-muted">/ mo</small></h1>
		            <ul class="list-unstyled mt-3 mb-4">
		              <li>10 users included</li>
		              <li>2 GB of storage</li>
		              <li>Email support</li>
		              <li>Help center access</li>
		            </ul>
		            <a href="card_details.php?plan=basic" class="btn btn-primary btn-lg btn-block">Get Started</a>
		          </div>
		        </div>
		    </div>
		    <div class="col-sm-4 col-md-4">
		        <div class="card mb-4 box-shadow">
		          <div class="card-header">
		            <h4 class="my-0 font-weight-normal">Pro</h4>
		          </div>
		          <div class="card-body">
		            <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
		            <ul class="list-unstyled mt-3 mb-4">
		              <li>20 users included</li>
		              <li>10 GB of storage</li>
		              <li>Priority email support</li>
		              <li>Help center access</li>
		            </ul>
		            <a href="card_details.php?plan=pro" class="btn btn-lg btn-block btn-primary">Get started</a>
		          </div>
		        </div>
		    </div>
		    <div class="col-sm-4 col-md-4">
		        <div class="card mb-4 box-shadow">
		          <div class="card-header">
		            <h4 class="my-0 font-weight-normal">Enterprise</h4>
		          </div>
		          <div class="card-body">
		            <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
		            <ul class="list-unstyled mt-3 mb-4">
		              <li>30 users included</li>
		              <li>15 GB of storage</li>
		              <li>Phone and email support</li>
		              <li>Help center access</li>
		            </ul>
		            <a href="card_details.php?plan=enterprise" class="btn btn-lg btn-block btn-primary">Get Started</a>
		          </div>
		        </div>
		    </div>
	    </div>
      </div>
  	</div>

<?php
include 'includes/footer.inc.php'; 
?>
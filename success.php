
<?php
session_start();
if(empty($_SESSION)){
 header('Location:login_form.php');
}else{
 $is_logged_in=1;
}
$user_id=$_SESSION['user_id'];
?>
<?php include("includes/header.php");?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<img style="display: block;margin: auto;width: 200px;height: 200px" src="https://thumbs.dreamstime.com/b/mobile-shopping-app-modern-online-technology-internet-customer-service-icon-order-placed-processing-processed-metaphors-vector-184200609.jpg">
			<h1 class="text-md-center">Order Placed Successfully</h1>
			<a href="orders.php" class=" btn btn-dark btn-lg"style="display: block;margin: auto;"> Go to your orders</a>
		</div>
		
	</div>
	
</div>

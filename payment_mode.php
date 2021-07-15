
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
<div class="container mt-5">
	<div class="row">
		<div class="col-6">
			<h4 class="mb-4">Select Payment Option</h4>
			<form action="payment_confirmation.php" method="POST">
				<input type="radio" name="x" value="credit card">Credit Card<br><br>
				<input type="radio" name="x" value="Debit Card">Debit Card<br><br>
				<input type="radio" name="x" value="UPI">UPI<br><br>
				<input type="radio" name="x" value="Wallet">Wallet<br><br>
				<input type="radio" name="x" value="Net Banking">Net Banking<br><br>
				<input type="radio" name="x" value="COD">COD<br><br>
				<input type="submit" name="" class="btn btn-warning" value="Pay Now">
				<input type="hidden" name="order_id" value="<?php echo $_GET['order_id'];?>">
			</form>
			
		</div>
		
	</div>
	
</div>

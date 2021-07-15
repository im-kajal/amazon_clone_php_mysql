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
	<div class="row ml-2" style="display: block;">
		<h3 class="mt-5 mb-3">Your Address</h3>
		<p class="text-info">Select Address</p>
	</div>
	<form action="select_payment_mode.php" method="POST" >
	<div class="row">	
	        
	        	
	       
			<?php
			include ("includes/dbhelper.php");
			$query="SELECT * FROM address WHERE user_id=$user_id";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_assoc($result)){
				echo '<div class="col-2"><div class="card"><p class="ml-2"><input type="radio" name="x" class="" value="'.$row['address_id'].'">
				     '.$row['street_address'].'<br>
				     '.$row['landmark'].'<br>
				     '.$row['city'].'
				     '.$row['pin'].'<br>
				     '.$row['state'].'<br>
				     '.$row['contact'].'</p></div></div>';
                      
			}  
			?>
			
			
        <div class="col-2">
			<div class="card" style="height:140px">
				<a style="text-align:center;"href="#"class="mt-5" data-toggle="modal" data-target="#exampleModal">Add New Address</a>
			</div>
		</div>
    	
	</div>
	<hr>

	<div class="row">
		<div class="col-6">
			<input type="hidden" name="order_id" value="<?php echo $_GET ['order_id'];?>">
			<input type="submit" class="btn btn-warning" style="float: right;" name="" value="Proceed to Pay">
			
         </div>
		
	 </div>
	</form>
 </div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Your Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action="add_address.php" method="POST" >
           	<label>Street Adress</label><br>
           	<textarea name="street_address"class="form-control"></textarea><br>
           	<label>Landmark</label><br>
           	<textarea name="landmark"class="form-control"></textarea><br>
           	<label>City</label><br>
           	<input  class="form-control" type="text" name="city"><br>
           	<label>State</label><br>
           	<input class="form-control" type="text" name="state"><br>
           	<label>Contact No</label><br>
           	<input class="form-control"type="text" name="contact_no"><br>
           	<label>Pincode</label><br>
           	<input class="form-control"type="text" name="pincode"><br><br>
           	<input type="submit" value="Add Address" class="btn btn-warning" name="">
           </form>
       
      </div>
    </div>
  </div>
</div>
</body>
</html>
			
	
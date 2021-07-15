<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>
<style type="text/css">
	.container{
		max-width: 400px;
	}
	.btn-warning{
		background-color: #F2CA65;
	}
</style>

<body>
	<div class="container">
		<div   align="center";>
			<img src="https://zeevector.com/wp-content/uploads/LOGO/Amazon-India-Logo-PNG-HD.png" style="height: 40px;width: 100px">
		</div>
		<div class="card p-4 mt-2">
			<h3>Create account</h3>
			<?php
			   if(!empty($_GET)){
			   	if($_GET['error']==1){
			   	echo '<p style="color:red">Email already exists</p>';
			   
			    }else{
				echo '<p style="color:red">Email already exists</p>';
					 }
			    }
			?>
			<form action="reg_validation.php" method="POST">
				<label><b>Your Name</b></label>
				<input type="text" name="name" class="form-control ">
				<label><b>Email</b></label>
				<input type="email" name="email" class="form-control">
				<label><b>Password</b></label>
				<input type="password" name="password" class="form-control"><br>
				<input type="submit" name="" class="btn btn-sm btn-warning btn-block text-dark" value="continue">
			
			</form>
			<small class="mt-2">Already have an account? <a href="login_form.php">Sign in</a></small>
		</div >
		
		
	</div>

</body>
</html>
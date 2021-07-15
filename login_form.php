<?php
session_start();
if (!empty($_SESSION)) {
	header('Location:index.php');
	# code...
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>
<style type="text/css">
	.container{
		max-width: 400px;
	}
	.btn-light{
	background-color: #eee !important;
	border:solid #aaa 1px !important;
}
</style>

<body>
	<div class="container">
		<div   align="center";>
			<img src="https://zeevector.com/wp-content/uploads/LOGO/Amazon-India-Logo-PNG-HD.png" style="height: 40px;width: 100px">
		</div>
		<div class="card p-4 mt-2">
			<h2>Sign-In</h2>
			<?php
			 if(!empty($_GET)){
			   
			   	echo '<p style="color:red">Incorrect Email/Password</p>';
			   
			    }
			    ?>

			<form action="login_validation.php" method="POST">
				<label><b>Email</b></label>
			<input type="email" name="email" class="form-control">
			<label><b>Password</b></label>
			<input type="password" name="password" class="form-control"><br>
			<input type="submit" class="btn btn-sm btn-warning btn-block text-dark" value="continue">
			</form>
			
			<small>By continuing, you agree to Amazon's Conditions of Use and Privacy Notice.</small>
			
		</div >
		<div align="center">
			<small align="center">New to Amazon?</small>
			<a  href="registration_form.php"class=" mt-2 btn btn-sm btn-light btn-block text-dark">create your Amazon account</a>
		</div>
		
		
	</div>

</body>
</html>
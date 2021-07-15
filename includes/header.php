<!DOCTYPE html>
<html>
<head>
	<title>Amazon</title>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>

<body>
	<nav class="navbar bg-nav">
		<a href="index.php"> <img src="https://pngimg.com/uploads/amazon/amazon_PNG11.png" style="width:100px; height:40px"></a>
    <?php
    if($is_logged_in){
       echo '<div class="dropdown" style="margin-right:80px;">
              <p class="text-white dropdown-toggle" type="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               '."Hi! ".$_SESSION['name'].'
              </p>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="orders.php">Orders</a>
                <a class="dropdown-item" href="cart.php">My Cart</a>
                <a class="dropdown-item" href="wishlist.php">Whishlists</a>
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </div>';
     }else{
      echo '<a href="login_form.php"><p class="text-white "><small>Hello,Signin</small><br><b>Account & Lists</b></p></a>';

     }
    ?>
  </nav>
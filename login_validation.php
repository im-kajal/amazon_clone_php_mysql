<?php
session_start();
$conn=mysqli_connect("localhost","root","","amazon");
$email=$_POST['email'];
$password=$_POST['password'];
$query="SELECT * FROM users WHERE email LIKE '$email' AND password LIKE '$password'";
$result=mysqli_query($conn,$query);
$result_arr=mysqli_fetch_assoc($result);
$num_rows=mysqli_num_rows($result);
if($num_rows==1){
	$_SESSION['name']=$result_arr['name'];
	$_SESSION['user_id']=$result_arr['user_id'];
	header ('Location:index.php');
}else{
	header('Location:login_form.php?error=1');
}


?>
<?php
//connect tp data base 
//receive user input and run sql query add  the user to our database
session_start();
$conn=mysqli_connect("localhost","root","","amazon");

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$query="INSERT INTO users VALUES(NULL,'$name','$email','$password')";
$query1="SELECT * FROM users WHERE email LIKE '$email'";
$result = mysqli_query($conn,$query1);
$num_rows=mysqli_num_rows($result);

if($num_rows==0){
	if(mysqli_query($conn,$query)){
		$query2="SELECT * FROM users WHERE email LIKE '$email'";
		$result2=mysqli_query($conn,$query2);
		$result2_arr=mysqli_fetch_assoc($result2);

		$_SESSION['name']=$result2_arr['name'];
		$_SESSION['user_id']=$result2_arr['user_id'];

	header ('Location:index.php');
    }else{
	header('Location:registration_form.php?error=0');

    }
}else{
	header('Location:registration_form.php?error=1');
}



?>
<?php
session_start();
$payment_method=$_POST['x'];
$order_id=$_POST['order_id'];

$user_id=$_SESSION['user_id'];
include "includes/dbhelper.php";
$query="UPDATE orders SET status=1,payment_method='$payment_method' WHERE order_id='$order_id'";
if(mysqli_query($conn,$query)){
	$query1="DELETE FROM cart WHERE user_id=$user_id";
	if(mysqli_query($conn,$query1)){
		header('location:success.php');
	}else{
		header('loactaion:payment_mode.php?order_id='.$order_id);
	}

}else{
	echo "error occured";
}

?>
<?php
session_start();
if(!empty($_SESSION)){
 $is_logged_in=1;
}else{
 $is_logged_in=0;
}
 $amount=$_POST['amount'];
date_default_timezone_set('Asia/kolkata');
$order_date=date("Y/m/d h/i");
$order_id=uniqid();
$user_id=$_SESSION['user_id'];
include("includes/dbhelper.php");

$query="INSERT INTO orders VALUES('$order_id','$user_id','$order_date','pending','None','$amount',0)";
if(mysqli_query($conn,$query)){
	echo $order_id;

    $query1="SELECT * FROM cart c JOIN products p ON c.product_id = p.product_id WHERE c.user_id = $user_id";
    $result=mysqli_query($conn,$query1);
	while($row=mysqli_fetch_assoc($result)){
		$product_id=$row['product_id'];
		$quantity=$row['quantity'];
		$query2="INSERT INTO order_detail VALUES(NULL,'$order_id','$product_id','$quantity')";
		mysqli_query($conn,$query2);


	}

}else{
	echo "failed";
}

?>



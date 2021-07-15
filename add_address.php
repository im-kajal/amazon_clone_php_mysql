<?php 

session_start();
include "includes/dbhelper.php";
$user_id=$_SESSION['user_id'];
$street_address=$_POST['street_address'];
$landmark=$_POST['landmark'];
$city=$_POST['city'];
$state=$_POST['state'];
$contact=$_POST['contact_no'];
$pincode=$_POST['pincode'];
$query="INSERT INTO address VALUES (NULL,'$user_id','$street_address','$landmark','$city','$state','$pincode','$contact')";
if(mysqli_query($conn,$query)){
	header('Location:show_address.php');

}else{
	echo "some error occured";
	echo $query;
}





 ?>
<?php
session_start();
if(!$_SESSION['check'])
{       
	echo '<script type="text/javascript">';
	echo 'window.location.href = "login.php";';
	echo '</script>';
}

require('connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$product_id=$_GET['product_id'];
	$query1="DELETE FROM `products` WHERE `product_id`='$product_id'";
	$query2="DELETE FROM `accountant` WHERE `product_id`='$product_id'";
	$query_run1=mysql_query($query1);
	$query_run2=mysql_query($query2);
	if($query_run1 && $query_run2)
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Deleted Successfully");'; 
		echo 'window.location.href = "adminproducts.php";';
		echo '</script>';
	}
	else
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Failed to Delete :(");'; 
		echo 'window.location.href = "adminproducts.php";';
		echo '</script>';
	}
}
?>

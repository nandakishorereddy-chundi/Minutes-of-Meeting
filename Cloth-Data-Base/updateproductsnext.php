<?php
session_start();
if(!$_SESSION['check'])
{       
	echo '<script type="text/javascript">';
	echo 'window.location.href = "login.php";';
	echo '</script>';
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	require('connect.php');
	$product_id=$_GET['product_id'];
	$retailersid=$_POST['retailersid'];
	$quantity=$_POST['quantity'];
	$unitprice=$_POST['unitprice'];
	$stock=$_POST['stock'];
	$date_of_purchase=$_POST['date_of_purchase'];
	$query="UPDATE `products` SET `retailersid`='$retailersid',`quantity`='$quantity',`unitprice`='$unitprice',
		`stock`='$stock',`date_of_purchase`='$date_of_purchase' WHERE `product_id`='$product_id'";
	$query_run=mysql_query($query);
	if($query_run)
	{
		echo '<script type="text/javascript">';
		echo 'alert("Successfully Updated :)");';
		echo 'window.location.href = "adminproducts.php";';
		echo '</script>';
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Failed to Updated :)");';
		echo 'window.location.href = "adminproducts.php";';
		echo '</script>';
	}
}
?>

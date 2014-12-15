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
	include('connect.php');
	$productname=$_POST['productname'];
	$retailersid=$_POST['retailersid'];
	$quantity=$_POST['quantity'];
	$unitprice=$_POST['unitprice'];
	$stock=$_POST['stock'];
	$date_of_purchase=$_POST['date_of_purchase'];
	$query="INSERT INTO `products`(`productname`, `retailersid`, `quantity`, `unitprice`, `stock`, `date_of_purchase`)
		VALUES ('$productname','$retailersid','$quantity','$unitprice','$stock','$date_of_purchase')";
	$query_run=mysql_query($query);
	if($query_run)
	{
		echo '<script type="text/javascript">';
		echo 'alert("Successfully Inserted :)");';
		echo '</script>';
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Failed to register :(");';
		echo 'window.location.href = "adminproducts.php";';
		echo '</script>';
	}
	 $product_id=mysql_insert_id();
	 $query="SELECT * FROM `expenditure` WHERE `expenditureid`=(SELECT max(`expenditureid`) FROM `expenditure`)";
	 $query_run=mysql_query($query);
	 if($query_run)
	 {
	 	$row=mysql_fetch_assoc($query_run);
	 	$totalexpenditure=$row['totalexpenditure'];
	 }
	 $finalprice=$unitprice+$totalexpenditure;
	 $finalprice+=0.1*$finalprice;
	$query="INSERT INTO `accountant`(`product_id`, `orginalprice`, `totalexpenditure`, `finalprice`) 
		VALUES ('$product_id','$unitprice','$totalexpenditure','$finalprice')";
	$query_run=mysql_query($query);
	echo '<script type="text/javascript">';
	echo 'window.location.href = "adminproducts.php";';
	echo '</script>';

}
else
{
	echo '<script type="text/javascript">'; 
	echo 'alert("Failed to Add Retailer :(");'; 
	echo 'window.location.href = "adminproducts.php";';
	echo '</script>';
}
?>

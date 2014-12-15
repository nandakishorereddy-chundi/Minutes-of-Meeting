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
	$companyname=$_POST['companyname'];
	$contactname=$_POST['contactname'];
	$flat_no=$_POST['flat_no'];
	$street=$_POST['street'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$zip=$_POST['zip'];
	$phone_no=$_POST['phone_no'];
	$query="INSERT INTO `retailers`(`companyname`, `contactname`, `flat_no`,
	 `street`, `city`, `state`, `zip`, `phone_no`)
	  VALUES ('$companyname','$contactname','$flat_no','$street','$city','$state','$zip','$phone_no')";
	$query_run=mysql_query($query);
	if($query_run)
	{
		echo '<script type="text/javascript">';
		echo 'alert("Successfully Inserted :)");';
		echo 'window.location.href = "retailers.php";';
		echo '</script>';
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Failed to register :(");';
		echo 'window.location.href = "retailers.php";';
		echo '</script>';
	}
}
else
{
	echo '<script type="text/javascript">'; 
	echo 'alert("Failed to Add Retailer :(");'; 
	echo 'window.location.href = "admin.php";';
	echo '</script>';
}
?>

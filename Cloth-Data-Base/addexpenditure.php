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
	$electricitybill=$_POST['electricitybill'];
	$rent=$_POST['rent'];
	$maintanancecharges=$_POST['maintanancecharges'];
	$salarycuttings=$_POST['salarycuttings'];
	$totalexpenditure=$electricitybill+$rent+$maintanancecharges+$salarycuttings;
	$query="INSERT INTO `expenditure`(`electricitybill`, `rent`, `maintanancecharges`, `salarycuttings`,
		`totalexpenditure`) VALUES ('$electricitybill','$rent','$maintanancecharges','$salarycuttings','$totalexpenditure')";
	$query_run=mysql_query($query);
	if($query_run)
	{
		echo '<script type="text/javascript">';
		echo 'alert("Successfully Inserted :)");';
		echo 'window.location.href = "expenditure.php";';
		echo '</script>';
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Failed to Insert :(");';
		echo 'window.location.href = "expenditure.php";';
		echo '</script>';
	}
}
else
{
	echo '<script type="text/javascript">'; 
	echo 'alert("Failed to Add Retailer :(");'; 
	echo 'window.location.href = "expenditure.php";';
	echo '</script>';
}
?>

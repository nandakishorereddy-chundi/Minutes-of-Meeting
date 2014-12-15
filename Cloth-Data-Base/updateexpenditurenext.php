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
	$expenditureid=$_GET['expenditureid'];
	$electricitybill=$_POST['electricitybill'];
	$rent=$_POST['rent'];
	$maintanancecharges=$_POST['maintanancecharges'];
	$salarycuttings=$_POST['salarycuttings'];
	$totalexpenditure=$electricitybill+$rent+$maintanancecharges+$salarycuttings;
	$query="UPDATE `expenditure` SET `electricitybill`='$electricitybill',`rent`='$rent',`maintanancecharges`='$maintanancecharges',
		`salarycuttings`='$salarycuttings',`totalexpenditure`='$totalexpenditure' WHERE `expenditureid`='$expenditureid'";
	$query_run=mysql_query($query);
	if($query_run)
	{
		echo '<script type="text/javascript">';
		echo 'alert("Successfully Updated :)");';
		echo 'window.location.href = "expenditure.php";';
		echo '</script>';
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Failed to Updated :)");';
		echo 'window.location.href = "expenditure.php";';
		echo '</script>';
	}
}
?>

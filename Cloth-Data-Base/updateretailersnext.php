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
	$retailersid=$_GET['retailersid'];
	$contactname=$_POST['contactname'];
	$flat_no=$_POST['flat_no'];
	$street=$_POST['street'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$zip=$_POST['zip'];
	$phone_no=$_POST['phone_no'];
	$query="UPDATE `retailers` SET `contactname`='$contactname',`flat_no`='$flat_no',`street`='$street',
		`city`='$city',`state`='$state',`zip`='$zip',`phone_no`='$phone_no' WHERE `retailersid`=$retailersid";
	$query_run=mysql_query($query);
	if($query_run)
	{
		echo '<script type="text/javascript">';
		echo 'alert("Successfully Updated :)");';
		echo 'window.location.href = "retailers.php";';
		echo '</script>';
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Failed to Updated :)");';
		echo 'window.location.href = "retailers.php";';
		echo '</script>';
	}
}
?>

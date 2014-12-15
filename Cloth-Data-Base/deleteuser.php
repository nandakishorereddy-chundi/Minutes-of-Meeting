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
	$userid=$_GET['userid'];
	$query1="DELETE FROM `employee` WHERE `userid`='$userid'";
	$query2="DELETE FROM `users` WHERE `username`='user.$userid'";
	$query_run1=mysql_query($query1);
	$query_run2=mysql_query($query2);
	if($query_run1 && $query_run2)
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Deleted Successfully From Both tables");'; 
		echo 'window.location.href = "admin.php";';
		echo '</script>';
	}
	else
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Failed to Delete :(");'; 
		echo 'window.location.href = "admin.php";';
		echo '</script>';
	}
}
?>

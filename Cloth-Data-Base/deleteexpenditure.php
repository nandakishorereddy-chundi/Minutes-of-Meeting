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
	$expenditureid=$_GET['expenditureid'];
	$query="DELETE FROM `expenditure` WHERE `expenditureid`='$expenditureid'";
	$query_run=mysql_query($query);
	if($query_run)
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Deleted Successfully");'; 
		echo 'window.location.href = "expenditure.php";';
		echo '</script>';
	}
	else
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Failed to Delete :(");'; 
		echo 'window.location.href = "expenditure.php";';
		echo '</script>';
	}
}
?>

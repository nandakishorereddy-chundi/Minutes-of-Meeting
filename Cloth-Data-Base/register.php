<?php
session_start();
if(!$_SESSION['check'])
{       
	echo '<script type="text/javascript">';
	echo 'window.location.href = "login.php";';
	echo '</script>';
}


include('connect.php');
$query="SELECT max(`userid`) FROM employee";
$query_run=mysql_query($query);
if($query_run)
{
	$val=mysql_result($query_run,0);
	$password=uniqid(rand(0,1));
	// selects max value present in employees table and sets it as username in users table
	$query="INSERT INTO `Cloth`.`users` (`username`, `password`, `flag`) VALUES ('user.$val', '$password', '0')";
	$query_run=mysql_query($query);
	if($query_run)
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Successfully Inserted into Users Table :)");'; 
		echo '</script>';
	}
	else
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Failed to register :(");'; 
		echo '</script>';
	}
}
else
{
		echo '<script type="text/javascript">'; 
		echo 'alert("Failed to run query :(");'; 
		echo '</script>';
}
?>

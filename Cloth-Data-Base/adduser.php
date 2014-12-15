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
	function register()
	{
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
				echo 'alert("Successfully Inserted :)");';
				echo 'window.location.href = "admin.php";';
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
	}
	include('connect.php');
	$fname=$_POST['first_name'];
	$lname=$_POST['last_name'];
	$date=date("Y-m-d");
	$gender=$_POST['gender'];
	$age=$_POST['age'];
	$salary=$_POST['salary'];
	$flat_no=$_POST['flat_no'];
	$street=$_POST['street'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$zip=$_POST['zip'];
	$phone_no=$_POST['phone_no'];
	$query="INSERT INTO employee (`userid`, `first_name`, `last_name`, `join_date`, `sex`, `age`, `salary`, 
		`flat_no`, `street`, `city`, `state`, `zip`, `phone_no`)
		VALUES (NULL, '$fname', '$lname', '$date', '$gender', '$age', '$salary',
				'$flat_no', '$street', '$city', '$state', '$zip', '$phone_no')";
	$query_run=mysql_query($query);
	register();
}
else
{
	echo '<script type="text/javascript">'; 
	echo 'alert("Failed to Add User :(");'; 
	echo 'window.location.href = "admin.php";';
	echo '</script>';
}
?>

<?php
$nameErr = "";
$passErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	include('connect.php');
	$user=$_POST['username'];
	$name="SELECT `username` FROM users WHERE username='$user'";
	$result=mysql_query($name);
	$num=mysql_num_rows($result);
	if(empty($_POST["username"]))
	{
		$nameErr = "Name is required";
	}
	else if($num!=1)
	{
		$nameErr = "Username Dosenot Exist";
	}
	else
	{
		$query="SELECT * FROM users WHERE username='$user'";
		$query_run=mysql_query($query);
		$row=mysql_fetch_assoc($query_run);
		$pass=$row['password'];
		$flag=$row['flag'];
		if($pass==$_POST['password'])
		{
			$pass=$_POST['newpass'];
			$query="UPDATE users SET `password`='$pass' WHERE `username`='$user'";
			$result=mysql_query($query);
			if($result)
			{
				echo '<script type="text/javascript">'; 
				echo 'alert("Password Updated Succesfully :)");'; 
				echo 'window.location.href = "login.php";';
				echo '</script>';
			}
			else
			{
				echo '<script type="text/javascript">'; 
				echo 'alert("Failed to Update :(");'; 
				echo 'window.location.href = "login.php";';
				echo '</script>';
			}
		}
		else
		{
			$passErr="Password is incorrect";
			echo '<script type="text/javascript">'; 
			echo 'alert("Password is incorrect");'; 
			echo 'window.location.href = "changepassword.php";';
			echo '</script>';
		}
	}
}
?>

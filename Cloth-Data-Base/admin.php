<!DOCTYPE html>
<?php
session_start();
if(!$_SESSION['check'])
{
	echo '<script type="text/javascript">';
	echo 'window.location.href = "login.php";';
	echo '</script>';
}
require('connect.php');
?>
<html lang="en">
<head>
<script type="text/javascript">
	{	
		function RedirectToLocation()
		{
			 window.location.href='login.php';
		}
	}
	</script>
	<link href="css/elements.css" rel="stylesheet">
	<script src="js/my_js.js"></script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>ADMIN</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/simple-sidebar.css" rel="stylesheet">
	<style>
		table {
			width:100%;
		}
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		th, td {
			padding: 15px;
			text-align: left;
		}
		table#t01 tr:nth-child(even) {
			background-color: #eee;
		}
		table#t01 tr:nth-child(odd) {
			background-color:#fff;
		}
		table#t01 th    {
			background-color: black;
			color: white;
		}
	</style>
</head>
<body id="body" style="overflow:hidden;">
	<div id="wrapper">
		<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<li class="sidebar-brand">
					<a href="admin.php">
						ADMINSTRATOR
					</a>
				</li>
				<li>
					<a href="admin.php">Employee</a>
				</li>
				<li>
					<a href="retailers.php">Retailers</a>
				</li>
				<li>
					<a href="accountant.php">Accountant</a>
				</li>
				<li>
					<a href="adminproducts.php">Products</a>
				</li>
				<li>
					<a href="expenditure.php">Expenditure</a>
				</li>
				<li>
					<a href="cusorder.php">Orders</a>
				</li>
			</ul>
		</div>
		<div id="page-content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div id="abc">
							<div id="popupContact">
								<form action="adduser.php" id="form" method="post" name="form">
									<img id="close" src="images/3.png" onclick ="div_hide()">
									<h2>User Info</h2>
									<hr>
									<input id="name" name="first_name" placeholder="First Name*" type="text" required/>

									<input id="name" name="last_name" placeholder="Last Name*" type="text" required/><br><br>
									
									<input name="gender" type="radio" value="0" required>Male</input>

									<input name="gender" type="radio" value="1" required>Female</input><br><br>

									<input id="age" name="age" placeholder="Age*" type="number" required/><br><br>

									<input id="salary" name="salary" placeholder="Salary*" type="number" required/>

									<input id="address" name="flat_no" placeholder="Flat Number" type="text"/>
									
									<input id="address" name="street" placeholder="Street" type="text"/>
									
									<input id="address" name="city" placeholder="City" type="text"/>
									
									<input id="address" name="state" placeholder="Sate" type="text"/>
									
									<input id="address" name="zip" placeholder="ZIP" type="text"/>
									
									<input id="address" name="phone_no" placeholder="PhoneNumber*" type="text" required/><br><br>

									<input class="btn btn-default" name="submit" placeholder="Submit" type="submit" value="Submit"/>
								</form>
							</div>
						</div>
						<button class="btn btn-primary" onclick="div_show()">ADD USER</button>
						<button style="position:relative;left:52em;top:2px;" class="btn btn-default" onclick="RedirectToLocation()">Log Out</button>
						<h1 align="center">Employee Details</h1>
						<p>
							<table class="table table-hover">
								<tr>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Joining Date</th>
									<th>Gender</th>
									<th>Age</th>
									<th>Salary</th>
									<th>Address</th>
								</tr>	
								<?php
								$query="SELECT * FROM `employee` ORDER BY `userid` DESC";
								$query_run=mysql_query($query);
								if($query_run)
								{
									while($row=mysql_fetch_assoc($query_run))
									{
										$userid=$row['userid'];
										$_SESSION['userid']=$userid;
										$fname=$row['first_name'];
										$lname=$row['last_name'];
										$date=$row['join_date'];
										$gender=$row['sex'];
										if($gender==0)
											$gender="Male";
										else
											$gender="Female";
										$age=$row['age'];
										$salary=$row['salary'];
										$address=$row['flat_no'].",";
										$address.=$row['street'].",";
										$address.=$row['city'].",";
										$address.=$row['state'].",";
										$address.=$row['zip'].",";
										$address.=$row['phone_no'];
										echo "<tr>";
										echo "<td>$fname</td><td>$lname</td><td>$date</td><td>$gender</td><td>$age</td><td>$salary</td><td>$address</td>
										<td>
											<form method='post' style='border:0'>
												<button class='btn btn-warning' type='submit' formaction='updateuser.php?userid=$userid'>Edit</button>
												<button class='btn btn-danger' type='submit' formaction='deleteuser.php?userid=$userid'>Delete</button>
											</form>
										</td>";
										echo "</tr>";
									}
								}
								?>
							</table>
						</p>
						<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
	</script>
</body>
</html>

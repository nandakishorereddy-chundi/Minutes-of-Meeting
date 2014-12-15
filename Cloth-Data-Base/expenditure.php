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
	<title>EXPENDITURE</title>
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
								<form action="addexpenditure.php" id="form" method="post" name="form">
									<img id="close" src="images/3.png" onclick ="div_hide()">
									<h2>Expenditure Info</h2>
									<hr>
									<input id="electricitybill" type="number" name="electricitybill" placeholder="Electricity Bill*" required /><br><br>

									<input id="rent" type="number" name="rent" placeholder="Rent*" required /><br><br>

									<input id="maintanancecharges" type="number" name="maintanancecharges" placeholder="Maintanance Charges*" required /><br><br>

									<input id="salarycuttings" type="number" name="salarycuttings" placeholder="Salary Cuttings*" required /><br><br>

									<input class="btn btn-default" name="submit" placeholder="Submit" type="submit" value="Submit"/>
								</form>
							</div>
						</div>
						<button class="btn btn-primary" onclick="div_show()">ADD</button>
						<button style="position:relative;left:52em;top:2px;" class="btn btn-default" onclick="RedirectToLocation()">Log Out</button>
						<h1 align="center">Expenditure Details</h1>
						<p>
						<table class="table table-hover">
								<tr>
									<th>Electricity Bill</th>
									<th>Rent</th>
									<th>Maintanance Charges</th>
									<th>Salary Cuttings</th>
									<th>Total Expenditure</th>
								</tr>	
								<?php
								$query="SELECT * FROM `expenditure` ORDER BY `expenditureid` DESC";
								$query_run=mysql_query($query);
								if($query_run)
								{
									while($row=mysql_fetch_assoc($query_run))
									{
										$expenditureid=$row['expenditureid'];
										$electricitybill=$row['electricitybill'];
										$rent=$row['rent'];
										$maintanancecharges=$row['maintanancecharges'];
										$salarycuttings=$row['salarycuttings'];
										$totalexpenditure=$row['totalexpenditure'];
										echo "<tr>";
										echo "<td>$electricitybill</td><td>$rent</td><td>$maintanancecharges</td><td>$salarycuttings</td><td>$totalexpenditure</td>
										<td>
											<form method='post' style='border:0px;'>
												<button class='btn btn-warning' type='submit' formaction='updateexpenditure.php?expenditureid=$expenditureid'>Edit</button>
												<button class='btn btn-success' type='submit' formaction='deleteexpenditure.php?expenditureid=$expenditureid'>Delete</button>
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

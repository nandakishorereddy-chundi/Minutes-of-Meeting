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
$expenditureid=$_GET['expenditureid'];
$query="SELECT * FROM `expenditure` WHERE `expenditureid`='$expenditureid'";
$query_run=mysql_query($query);
if($query_run)
{
	$row=mysql_fetch_assoc($query_run);
	$expenditureid=$row['expenditureid'];
	$electricitybill=$row['electricitybill'];
	$rent=$row['rent'];
	$maintanancecharges=$row['maintanancecharges'];
	$salarycuttings=$row['salarycuttings'];
	$totalexpenditure=$row['totalexpenditure'];
}
?>
<html lang="en">
<head>
	<link href="css/elements.css" rel="stylesheet">
	<script src="js/my_js.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>ADMIN</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/simple-sidebar.css" rel="stylesheet">
	<script type="text/javascript">
	{
		window.onload="div_show()";	
		function RedirectToLocation()
		{
			 window.location.href='addexpenditure.php';
		}
	}
	</script>
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

<body id="body" style="overflow:hidden;" onload="div_show()">
	<div id="wrapper">

		<!-- Sidebar -->
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
					<a href="products.php">Products</a>
				</li>
				<li>
					<a href="expenditure.php">Expenditure</a>
				</li>
			</ul>
		</div>
		<div id="page-content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div id="abc">
							<div id="popupContact">
								<form action='updateexpenditurenext.php?expenditureid=<?php echo $expenditureid; ?>' id="form" method="post" name="form">
									<img id="close" src="images/3.png" onclick ="hide_expenditure()">
		
										<h3>Expenditure Id:<?php echo $expenditureid; ?></h3>
									<hr>
									ElectricityBill : <input id="electricitybill" type="number" name="electricitybill" value=<?php echo $electricitybill; ?> /><br><br>

									Total Rent : <input id="rent" type="number" name="rent" value=<?php echo $rent; ?> /><br><br>

									Maintanance :<input id="maintanancecharges" type="number" name="maintanancecharges" value=<?php echo $maintanancecharges; ?> /><br><br>

									SalaryCuttings : <input id="salarycuttings" type="number" name="salarycuttings" value=<?php echo $salarycuttings; ?> /><br><br>

									<input id="button" name="submit" placeholder="Submit" type="submit" value="Submit"/>
								</form>
							</div>
						</div>
						<button class="button" type="submit" onclick="RedirectToLocation()">ADD EXPENDITURE</button> 
						<h1 align="center">EXPENDITURE DETAILS</h1>
						<p>
							<table id="t01">
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
										echo "<td>$expenditureid</td><td>$electricitybill</td><td>$rent</td><td>$maintanancecharges</td>$salarycuttings<td>$totalexpenditure</td>
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
		<!-- /#page-content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- jQuery -->
	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<!-- Menu Toggle Script -->
	<script>
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
	</script>

</body>

</html>


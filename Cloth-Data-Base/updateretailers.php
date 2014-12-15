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
$retailersid=$_GET['retailersid'];
$query="SELECT * FROM `retailers` WHERE `retailersid`='$retailersid'";
$query_run=mysql_query($query);
if($query_run)
{
	$row=mysql_fetch_assoc($query_run);
	$retailersid=$row['retailersid'];
	$companyname=$row['companyname'];
	$contactname=$row['contactname'];
	$flat_no=$row['flat_no'];
	$street=$row['street'];
	$city=$row['city'];
	$state=$row['state'];
	$zip=$row['zip'];
	$phone_no=$row['phone_no'];
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
			 window.location.href='addretailers.php';
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
								<form action='updateretailersnext.php?retailersid=<?php echo $retailersid; ?>' id="form" method="post" name="form">
									<img id="close" src="images/3.png" onclick ="hide_retailers()">
									<hr>
									<label for="fname">
										<h1>Company Name:<?php echo $companyname; ?></h1>
									</label>
									<input id="contactname" name="contactname" value=<?php echo $contactname ?> type="text"/>
									<input id="address" name="flat_no" value=<?php echo $flat_no ?> type="text"/>
									<input id="address" name="street" value=<?php echo $street ?> type="text"/>
									<input id="address" name="city" value=<?php echo $city ?> type="text"/>
									<input id="address" name="state" value=<?php echo $state ?> type="text"/>
									<input id="address" name="zip" value=<?php echo $zip ?> type="text"/>
									<input id="address" name="phone_no" value=<?php echo $phone_no ?> type="text"/>
									<input id="submit" name="submit" placeholder="Submit" type="submit" value="Submit"/>
								</form>
							</div>
						</div>
						<button class="button" type="submit" onclick="RedirectToLocation()">ADD RETAILER</button> 
						<h1 align="center">RETAILERS Details</h1>
						<p>
							<table id="t01">
								<tr>
									<th>Company Name</th>
									<th>Contact Name</th>
									<th>Address</th>
								</tr>	
								<?php
								$query="SELECT * FROM `retailers` ORDER BY `retailersid` DESC";
								$query_run=mysql_query($query);
								if($query_run)
								{
									while($row=mysql_fetch_assoc($query_run))
									{
										$retailersid=$row['retailersid'];
										$companyname=$row['companyname'];
										$contactname=$row['contactname'];
										$address=$row['flat_no'].",";
										$address.=$row['street'].",";
										$address.=$row['city'].",";
										$address.=$row['state'].",";
										$address.=$row['zip'].",";
										$address.=$row['phone_no'];
										echo "<tr>";
										echo "<td>$companyname</td><td>$contactname</td><td>$address</td>
										<td>
											<form method='post' style='border:0px;'>
												<button class='btn btn-warning' type='submit' formaction='updateretailers.php?retailersid=$retailersid'>Edit</button>
												<button class='btn btn-success' type='submit' formaction='deleteretailers.php?retailersid=$retailersid'>Delete</button>
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


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
$product_id=$_GET['product_id'];
$query="SELECT * FROM `products` WHERE `product_id`='$product_id'";
$query_run=mysql_query($query);
if($query_run)
{
	$row=mysql_fetch_assoc($query_run);
	$product_id=$row['product_id'];
	$productname=$row['productname'];
	$retailersid=$row['retailersid'];
	$quantity=$row['quantity'];
	$unitprice=$row['unitprice'];
	$stock=$row['stock'];
	$date_of_purchase=$row['date_of_purchase'];

}
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
			 window.location.href='addproducts.php';
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
								<form action='updateproductsnext.php?product_id=<?php echo $product_id; ?>' id="form" method="post" name="form">
									<img id="close" src="images/3.png" onclick ="hide_products()">
									<hr>
									<label for="fname">
										<h1>Product Name:<?php echo $productname; ?></h1>
									</label>
									<label>
									<span>Retailers Id</span><input id="retailersid" type="number" name="retailersid" value=<?php echo $retailersid; ?> />
									</label>

									<label>
									<span>Quantity</span><input id="quantity" type="number" name="quantity" value=<?php echo $quantity; ?> />
									</label>

									<label>
									<span>Unit Price</span><input id="unitprice" type="number" name="unitprice" value=<?php echo $unitprice; ?> />
									</label>

									<label>
									<span>Units in Stock</span><input id="stock" type="number" name="stock" value=<?php echo $stock; ?> />
									</label>

									<label>
									<span>Date of purchase</span><input id="date_of_purchase" type="date" name="date_of_purchase" value=<?php echo $date_of_purchase; ?> />
									</label>

									<label>
									<input id="button" name="submit" placeholder="Submit" type="submit" value="Submit"/>
									</label>
								</form>
							</div>
						</div>
						<button class="btn btn-primary" type="submit" onclick="RedirectToLocation()">ADD PRODUCT</button>
						<button style="position:relative;left:52em;top:2px;" class="btn btn-default" onclick="RedirectToLocation()">Log Out</button>
						<h1 align="center">PRODUCT Details</h1>
						<p>
							<table id="t01">
								<tr>
									<th>Company Name</th>
									<th>Contact Name</th>
									<th>Address</th>
								</tr>	
								<?php
								$query="SELECT * FROM `products` ORDER BY `product_id` DESC";
								$query_run=mysql_query($query);
								if($query_run)
								{
									while($row=mysql_fetch_assoc($query_run))
									{
										$product_id=$row['product_id'];
										$productname=$row['productname'];
										$retailersid=$row['retailersid'];
										$quantity=$row['quantity'];
										$unitprice=$row['unitprice'];
										$stock=$row['stock'];
										$date_of_purchase=$row['date_of_purchase'];
										echo "<tr>";
										echo "<td>$productname</td><td>$retailersid</td><td>$quantity</td><td>$unitprice</td>$stock<td>$date_of_purchase</td>
										<td>
											<form method='post' style='border:0px;'>
												<button class='btn btn-warning' type='submit' formaction='updateproducts.php?product_id=$product_id'>Edit</button>
												<button class='btn btn-success' type='submit' formaction='deleteproducts.php?product_id=$product_id'>Delete</button>
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


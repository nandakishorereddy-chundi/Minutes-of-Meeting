<!DOCTYPE html>
<?php
require('connect.php');
?>
<html lang="en">
<head>
<link href="css/elements.css" rel="stylesheet">
<script src="js/my_js.js"></script>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Simple Sidebar - Start Bootstrap Template</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/simple-sidebar.css" rel="stylesheet">


</head>

<body id="body" style="overflow:hidden;">
<div id="wrapper">

<!-- Sidebar -->
<div id="sidebar-wrapper">
<ul class="sidebar-nav">
<li class="sidebar-brand">
<a href="cashier.php">
Cashier
</a>
</li>	
</li>
<li>
<a href="cashier.php">Customer</a>
</li>
<li>
<a href="products.php">Products</a>
</li>
<li>
<a href="offer.php">Offer</a>
</li>
<li>
<a href="orders1.php">OrderDetails</a>
</li>
<li>
<a href="payment.php">Payment</a>
</li>
<li>
<a href="casorder.php">Orders</a>
</li>

</ul>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<a href ="login.php"><button class='btn btn-primary' onclick="login.php" style="position:absolute; margin-left:800px;">Logout</button></a>

<br><br>

<h1 align="center">Product Details</h1>
<p>
<table class="table table-hover">
<tr>
<th>ID</th>
<th>name</th>
<th>TotalQuantity</th>
<th>UnitPrice</th>
<th>RemainingStock</th>
</tr>	
<?php
$query="SELECT * FROM `products` ORDER BY `product_id`";
$query_run=mysql_query($query);
if($query_run)
{
	while($row=mysql_fetch_assoc($query_run))
	{
		$pid=$row['product_id'];
		$pname=$row['productname'];
		$rid=$row['retailersid'];
		$quantity=$row['quantity'];
		$uprice=$row['unitprice'];
		$stock=$row['stock'];
		$date=$row['date_of_purchase'];
		echo '<tr>';
		echo "<td>$pid</td>";
		echo "<td>$pname</td>";
		echo "<td> $quantity</td>";
		echo "<td>Rs $uprice/-</td>";
		echo "<td>$stock</td>";
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

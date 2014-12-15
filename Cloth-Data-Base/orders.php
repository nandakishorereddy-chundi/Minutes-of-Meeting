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
<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form action="odadd.php" id="form" method="post" name="form">
<img id="close" src="img/3.png" onclick ="div_hide()">
<h2>Enter Product Id</h2>
<hr>
<label for="id">
<input id="id" name="id" placeholder="Product ID" type="number"/>
</label>
<br><br>
<input id="submit" name="submit" placeholder="Submit" type="submit" value="Submit"/>
<!-- <a href="javascript:%20check_empty()" id="submit">Send</a>-->
</form>
</div>

<!-- Popup Div Ends Here -->
</div>
<!-- Display Popup Button -->
<div id="del">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form action="ordelete.php" id="form" method="post" name="form">
<img id="close" src="img/3.png" onclick ="div1_hide()">
<h2>Delete Order</h2>
<hr>
<label for="id">
<input id="id" name="id" placeholder="Product ID" type="number"/>
</label>
<br>
<br>
<input id="submit" name="submit" placeholder="Submit" type="submit" value="Submit"/>
<!-- <a href="javascript:%20check_empty()" id="submit">Send</a>-->
</form>
</div>

</div>
<div id="del">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form action="ent.php" id="form" method="post" name="form">
<img id="close" src="img/3.png" onclick ="div4_hide()">
<h2>EnterCustomerId</h2>
<hr>
<label for="fname">
<input id="id" name="customer_id" placeholder="Customer_id" type="text"/>
</label>
<br>
<br>
<input id="submit" name="submit" placeholder="Submit" type="submit" value="Submit"/>
<!-- <a href="javascript:%20check_empty()" id="submit">Send</a>-->
</form>
</div>

</div>
<div id="edit">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form action="ordedit.php" id="form" method="post" name="form">
<img id="close" src="img/3.png" onclick ="div2_hide()">
<h2>Edit Order</h2>
<hr>
<label for="fname">
<input id="id" name="pid" placeholder="Product Id" type="text"/>
</label>
<br>
<br>
<input id="submit" name="submit" placeholder="Submit" type="submit" value="Submit"/>
<!-- <a href="javascript:%20check_empty()" id="submit">Send</a>-->
</form>
</div>

</div>

<button class='btn btn-success' onclick="div_show()">Addproduct</button>
<button class="btn btn-danger" onclick="div1_show()">Delete</button>
<button class="btn btn-warning" onclick="div2_show()">Edit</button>
<a href ="login.php"><button class='btn btn-primary' onclick="login.php" style="position:absolute; margin-left:550px;">Logout</button></a>

<h1 align="center">Order Details</h1>
<p>
<table class="table table-hover">
<tr>
<th>ID</th>
<th>Product ID</th>
<th>Unit Price</th>
<th>Quantity</th>
<th>Total Price</th>
</tr>	
<?php
$query="SELECT * FROM `orders`";
$query_run=mysql_query($query);
if($query_run)
{
	$name=0;
	$pri=0;
	while($row=mysql_fetch_assoc($query_run))
	{
		$name=$name+1;
		$pid=$row['product_id'];
		$up=$row['unitprice'];
		$quan=$row['quantity'];
		$fp=$row['totalprice'];
		$pri=$pri+$fp;
		echo '<tr>';
		echo "<td>$name</td>";
		echo "<td>$pid</td>";
		echo "<td>$up</td>";
		echo "<td>$quan</td>";
		echo "<td>$fp</td>";
	}
}
?>

</table>
<?
if($pri > 0)
{
echo "<a href='cash.php' class='btn btn-success' style='position:absolute; margin-left:800px'>Make Payment</a>";
echo "<h4>FinalPrice: $pri </h4>";
}
?>
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

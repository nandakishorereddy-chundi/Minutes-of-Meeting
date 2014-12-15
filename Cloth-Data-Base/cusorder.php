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
<label for="fname">
<input id="id" name="id" placeholder="Product ID" type="text"/>
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
<form action="delete.php" id="form" method="post" name="form">
<img id="close" src="img/3.png" onclick ="div1_hide()">
<h2>Delete Customer</h2>
<hr>
<label for="fname">
<input id="id" name="id" placeholder="Customer ID" type="text"/>
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
<form action="fidel.php" id="form" method="post" name="form">
<img id="close" src="img/3.png" onclick ="div2_hide()">
<h2>ENter Order Id</h2>
<hr>
<label for="fname">
<input id="id" name="id" placeholder="Order_id" type="text"/>
</label>
<br>
<br>
<input id="submit" name="submit" placeholder="Submit" type="submit" value="Submit"/>
<!-- <a href="javascript:%20check_empty()" id="submit">Send</a>-->
</form>
</div>

</div>

<button class="btn btn-danger" onclick="div2_show()">Delete</button>
<a href ="login.php"><button class='btn btn-primary' onclick="login.php" style="position:absolute; margin-left:700px;">Logout</button></a>

<h1 align="center">Order Details</h1>
<p>
<table class="table table-hover">
<tr>
<th>OrderID</th>
<th>Customer ID</th>
<th>Products ID</th>
<th>NetQuantity</th>
</tr>	
<?php
$query="SELECT * FROM `orderdetails`";
$query_run=mysql_query($query);
if($query_run)
{
	while($row=mysql_fetch_assoc($query_run))
	{
		$oid=$row['order_id'];
		$cid=$row['customer_id'];
		$pro=$row['products'];
		$qn=$row['quantity'];
		echo '<tr>';
		echo "<td>$oid</td>";
		echo "<td>$cid</td>";
		echo "<td>$pro</td>";
		echo "<td>$qn</td>";
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

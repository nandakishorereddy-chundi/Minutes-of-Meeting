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

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- <style>
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
</style>-->

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
<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form action="addpayment.php" id="form" method="post" name="form">
<img id="close" src="img/3.png" onclick ="div_hide()">
<h2>Payment Details</h2>
<hr>
<label for="fname">
<input id="cashgiven" name="cashgiven" placeholder="CashGiven" type="text"/>
</label>

<br>
<br>
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
<form action="pdelete.php" id="form" method="post" name="form">
<img id="close" src="img/3.png" onclick ="div1_hide()">
<h2>Delete Payment Details</h2>
<hr>
<label for="fname">
<input id="id" name="id" placeholder="Payment Id" type="text"/>
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
<form action="pedit.php" id="form" method="post" name="form">
<img id="close" src="img/3.png" onclick ="div2_hide()">
<h2>Edit Payment Details</h2>
<hr>
<label for="fname">
<input id="id" name="paymentid" placeholder="Payment Id" type="text"/>
</label>
<br>
<br>
<input id="submit" name="submit" placeholder="Submit" type="submit" value="Submit"/>
<!-- <a href="javascript:%20check_empty()" id="submit">Send</a>-->
</form>
</div>

</div>

<button class="btn btn-danger" onclick="div1_show()">Delete</button>
<a href ="login.php"><button class='btn btn-primary' onclick="login.php" style="position:absolute; margin-left:700px;">Logout</button></a>

<h1 align="center">Payment Details</h1>
<p>
<table class="table table-hover">
<tr>
<th>PaymentID</th>
<th>Purchasedate</th>
<th>OrderId</th>
<th>TotalPrice</th>
<th>CashGiven</th>
<th>Change</th>
</tr>	
<?php
$query="SELECT * FROM `payment` ORDER BY `payment_id` DESC";
$query_run=mysql_query($query);
if($query_run)
{
	while($row=mysql_fetch_assoc($query_run))
	{
		$pid=$row['payment_id'];
		$date=$row['purchasedate'];
		$oid=$row['order_id'];
		//$flag=$row['offerflag'];
		$price=$row['totalprice'];
		$cash=$row['cashgiven'];
		$diff=$row['difference'];
		echo '<tr>';
		echo "<td>$pid</td>";
		echo "<td>$date</td>";
		echo "<td>$oid</td>";
		//echo "<td>$flag</td>";
		echo "<td>$price</td>";
		echo "<td>$cash</td>";
		echo "<td>$diff</td>";
		
	}
}
?>
</table>
</p>
<a href='orders1.php' class='btn btn-success' style='position:absolute; margin-left:800px'>Next Order</a>

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

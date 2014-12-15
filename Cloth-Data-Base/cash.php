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
<?php
include('connect.php');
$query="SELECT * FROM `orders`";
$query_run=mysql_query($query);
if($query_run)
{
        $name=0;
        $pri=0;
	$pid="";
	$quan=0;
        while($row=mysql_fetch_assoc($query_run))
        {
                $name=$name+1;
		$pid.=$row['product_id'].",";
                $quan=$row['quantity']+$quan;
                $fp=$row['totalprice'];
                $pri = $pri + $fp;
        }
}
$query="SELECT * FROM `orderdetails`";
$query_run=mysql_query($query);
if($query_run)
{
        while($row=mysql_fetch_assoc($query_run))
        {
                $id=$row['order_id'];
        }
}
$date=date("Y-m-d");
//$query="UPDATE `Cloth`.`orderdetails` SET `orderdetails`.`products`='$pid', `orderdetails`.`quantity`='$quan' WHERE `orderdetails`.`order_id`= $id ";
//$query="UPDATE `orderdetails` SET `products`=$pid, `quantity`=$quan WHERE `order_id`=$id";
//$query_run=mysql_query($query);
//$query="INSERT INTO payment (`payment_id`, `purchasedate`, `order_id`, `totalprice`,`cashgiven`,`difference`) VALUES (NULL,'$date', '$id', '$pri','0','0')";
//$query_run=mysql_query($query);
?>
<div id="abc1">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form action="proc.php" id="form" method="post" name="form">
<a href="orders.php"><img id="close" src="img/3.png"></a>
<h2>Cash Details</h2>
<hr>
<?php echo" OrderID:<input id='id' name='pid' value=$id type='text'readonly /><br><br>"?>
<label for="price">
<?php  echo "TotalPrice:<input id='price' name='price' value= $pri  type='number' read only/></label>";?>
<br><br>
Cash Given:<input id="cash" name="cashgiven" placeholder="Cash Given" type="number"/>
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
<form action="edit.php" id="form" method="post" name="form">
<img id="close" src="img/3.png" onclick ="div2_hide()">
<h2>Find Customer</h2>
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

<button class='btn btn-primary' onclick="div_show()">ADD USER</button>
<button class="btn btn-danger" onclick="div1_show()">Delete</button>
<button class="btn btn-warning" onclick="div2_show()">Edit</button>

<h1 align="center">Customer Details</h1>
<p>
<table class="table table-hover">
<tr>
<th>ID</th>
<th>Customer Name</th>
<th>PhoneNumber</th>
</tr>	
<?php
$query="SELECT * FROM `customers` ORDER BY `customer_id` DESC";
$query_run=mysql_query($query);
if($query_run)
{
	while($row=mysql_fetch_assoc($query_run))
	{
		$name=$row['name'];
		$id=$row['customer_id'];
		$phone=$row['phone_no'];
		echo '<tr>';
		echo "<td>$id</td>";
		echo "<td>$name</td>";
		echo "<td>$phone</td>";
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

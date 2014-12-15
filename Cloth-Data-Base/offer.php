<!DOCTYPE html>
<?php
require('connect.php');
$date=date("Y-m-d");
$query="DELETE * FROM `offer` WHERE `enddate` < '$date'";
$query_run=mysql_query($query);
/*if($query_run)
{
        while($row=mysql_fetch_assoc($query_run))
        {
		$id=$row['product_id'];
		$end=$row['enddate'];
		if($date > $end)
		{
			$query="DELETE FROM `offer` WHERE `product_id`='$id'";
			$query_run=mysql_query($query);

		}

	}
}*/

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
<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
<!-- Contact Us Form -->
<form action="addoffer.php" id="form" method="post" name="form">
<img id="close" src="img/3.png" onclick ="div_hide()">
<h2>Offer Details</h2>
<hr>
<label for id="pid">
Product_ID:<input id="id" name="pid" placeholder="Product_id" type="number"/>
<br><br>
</label>
<label for id="start">
StartDate : <input name="start" type= "date">
</label>
<br><br>
<label for id="end">
EndDate : <input name="end" type= "date">
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
<form action="odelete.php" id="form" method="post" name="form">
<img id="close" src="img/3.png" onclick ="div1_hide()">
<h2>Delete Offer</h2>
<hr>
<label for="id">
Product_ID : <input id="id" name="id" placeholder="Product Id" type="number"/>
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
<form action="addedit.php" id="form" method="post" name="form">
<img id="close" src="img/3.png" onclick ="div2_hide()">
<h2>Edit Offer Details</h2>
<hr>
<label for="id">
Product_ID : <input id="id" name="id" placeholder="Product ID" type="number">
</label>
<br><br>
<!--<label for id="start">
StartDate : <input name="start" type= "date">
</label>
<br><br>
<label id="end">
EndDate : <input name="end" type= "date">
</label>
<br><br>


<br>
<br>-->
<input id="submit" name="submit" placeholder="Submit" type="submit" value="Submit"/>
<!-- <a href="javascript:%20check_empty()" id="submit">Send</a>-->
</form>
</div>

</div>

<button class='btn btn-primary' onclick="div_show()">AddOffer</button>
<button class="btn btn-danger" onclick="div1_show()">Delete</button>
<button class="btn btn-warning" onclick="div2_show()">Edit</button>
<a href ="login.php"><button class='btn btn-primary' onclick="login.php" style="position:absolute; margin-left:550px;">Logout</button></a>

<h1 align="center">Offer Details</h1>
<p>
<table class="table table-hover">
<tr>
<th>ProductId</th>
<th>Start Date</th>
<th>End Date</th>
</tr>	
<?php
$query="SELECT * FROM `offer` ORDER BY `product_id`";
$query_run=mysql_query($query);
if($query_run)
{
	while($row=mysql_fetch_assoc($query_run))
	{
		$pid=$row['product_id'];
		$start=$row['startdate'];
		$end=$row['enddate'];
		echo '<tr>';
		echo "<td>$pid</td>";
		echo "<td>$start</td>";
		echo "<td>$end</td>";
		echo '</tr>';
		
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

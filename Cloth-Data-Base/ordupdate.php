<?php
include('connect.php');
$id=$_POST['pid'];
$up=$_POST['unitprice'];
$qu=$_POST['quantity'];
$fp=$up * $qu;
$query="SELECT * FROM  `orders` WHERE `product_id` = $id";
$query_run=mysql_query($query);
if ($qu>0)
{
if($query_run)
{
	 while($row=mysql_fetch_assoc($query_run))
        {
                $qun=$row['quantity'];
	}
}
$query="SELECT * FROM `products` WHERE `product_id`='$id'";
$query_run=mysql_query($query);
if($query_run)
{
        while($row=mysql_fetch_assoc($query_run))
        {
                $stock=$row['stock'];
        }
}
$qn=$stock -$qu+$qun ;
echo $qn;
//$query = "UPDATE `Cloth`.`products` SET `products`.`stock`='$fname', `customers`.`phone_no`='$phone_no' WHERE `customers`.`customer_id`= $id ";
$query = "UPDATE `Cloth`.`products` SET `products`.`stock`=$qn  WHERE `products`.`product_id`= $id ";
$query_run=mysql_query($query);

//echo $id;
//$query= "UPDATE `customers` SET `name`= $fname , `phone_no`= $phone_no WHERE `customer_id` = $id ";
$query =" UPDATE `Cloth`.`orders` SET `orders`.`quantity`= $qu, `orders`.`totalprice`=$fp WHERE `orders`.`product_id`= $id ";

//$query="SELECT * FROM `customers` WHERE `customer_id` ='$id' ";
//echo $query;
$query_run=mysql_query($query);
if($query_run)
{
	$newURL="orders.php";
	header('Location: '.$newURL);

}
}
else{
 echo '<script type="text/javascript">';
 echo 'alert("Quantity should be greater than zero or not null");';
 echo 'window.location.href = "orders.php";';
 echo '</script>';

}
?>

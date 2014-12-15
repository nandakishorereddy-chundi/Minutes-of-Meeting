<?php
include('connect.php');
$id=$_POST['id'];
$up=$_POST['unitprice'];
$qu=$_POST['quantity'];
$fp=$up * $qu;
if ($qu > 0 )
{
$query="INSERT INTO `orders`(`product_id`, `unitprice`, `quantity`, `totalprice`) VALUES ($id, $up, $qu,$fp)";
$query_run=mysql_query($query);
if($query_run)
{
$query="SELECT * FROM `products` WHERE `product_id`='$id'";
$query_run=mysql_query($query);
if($query_run)
{
        while($row=mysql_fetch_assoc($query_run))
        {
                $pid=$row['product_id'];
                $pname=$row['productname'];
                $quantity=$row['quantity'];
                $uprice=$row['unitprice'];
                $stock=$row['stock'];
	}
}
$qn=$stock - $qu;
echo $qn;
//$query = "UPDATE `Cloth`.`products` SET `products`.`stock`='$fname', `customers`.`phone_no`='$phone_no' WHERE `customers`.`customer_id`= $id ";
$query = "UPDATE `Cloth`.`products` SET `products`.`stock`=$qn  WHERE `products`.`product_id`= $id ";
$query_run=mysql_query($query);

	      echo '<script type="text/javascript">';
 echo 'alert("Order Added sucessfully");';
 echo 'window.location.href = "orders.php";';
 echo '</script>';

}
}
else{
//echo mysql_error(); 
      echo '<script type="text/javascript">';
 echo 'alert("Quantity should be greater than zero or not null");';
 echo 'window.location.href = "orders.php";';
 echo '</script>';
}
?>

<?php
include('connect.php');
$id=$_POST['id'];
$cnt=0;
$query="SELECT * FROM `orders` WHERE `product_id` ='$id' ";
$query_run=mysql_query($query);
if($query_run)
{
        while($row=mysql_fetch_assoc($query_run))
        {
                $st=$row['quantity'];
	}
}
$query="DELETE FROM `orders` WHERE `product_id`='$id'";
$query_run=mysql_query($query);
@$tem=mysql_affected_rows();
if($query_run && $tem > 0)
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
$qn=$stock + $st;

//$query = "UPDATE `Cloth`.`products` SET `products`.`stock`='$fname', `customers`.`phone_no`='$phone_no' WHERE `customers`.`customer_id`= $id ";
$query = "UPDATE `Cloth`.`products` SET `products`.`stock`='$qn' WHERE `products`.`product_id`= $id ";
$query_run=mysql_query($query);

	   echo '<script type="text/javascript">';
	 echo 'alert("Deleted Order Sucessfully");';
	 echo 'window.location.href = "orders.php";';
	 echo '</script>';
}

/*if($cnt)
{
        $query = "UPDATE `Cloth`.`products` SET `products`.`unitprice`='$up' WHERE `products`.`product_id`= $id ";
        $query_run=mysql_query($query);
}
if($query_run=mysql_query($query))
{*/
else
{
   echo '<script type="text/javascript">';
 echo 'alert("Incorrect product Id");';
 echo 'window.location.href = "orders.php";';
 echo '</script>';

//$newURL="orders.php";
//header('Location: '.$newURL);
}
//else 
//{
//echo "Offer doesnot exists for the given product";
//}
?>


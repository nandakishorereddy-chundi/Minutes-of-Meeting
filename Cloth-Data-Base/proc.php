<?php
include('connect.php');
$cg=$_POST['cashgiven'];
$id=$_POST['pid'];
$cash=$_POST['price'];
if ($cg > $cash)
{
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
$query="UPDATE `Cloth`.`orderdetails` SET `orderdetails`.`products`='$pid', `orderdetails`.`quantity`='$quan' WHERE `orderdetails`.`order_id`= $id ";
//$query="UPDATE `orderdetails` SET `products`=$pid, `quantity`=$quan WHERE `order_id`=$id";
$query_run=mysql_query($query);
$query="INSERT INTO payment (`payment_id`, `purchasedate`, `order_id`, `totalprice`,`cashgiven`,`difference`) VALUES (NULL,'$date', '$id', '$pri','0','0')";
$query_run=mysql_query($query);

$query="SELECT * FROM payment WHERE `order_id`= $id ";
$query_run=mysql_query($query);
if($query_run)
{
        while($row=mysql_fetch_assoc($query_run))
        {
                $tp=$row['totalprice'];
	}
$query="DELETE FROM `orders`";
$query_run=mysql_query($query);
echo $cg;
echo $tp;
$diff=$cg - $tp;
echo $diff;
$query = "UPDATE `Cloth`.`payment` SET `payment`.`cashgiven`='$cg', `payment`.`difference`='$diff' WHERE `payment`.`order_id`= $id ";
if ($query_run=mysql_query($query)){
$newURL="payment.php";
header('Location: '.$newURL);
}
}
}
else
{
   echo '<script type="text/javascript">';
 echo 'alert("Amount entered is less than total price" );';
 echo 'window.location.href = "cash.php";';
 echo '</script>';

}
?>


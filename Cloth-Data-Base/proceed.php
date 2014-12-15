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
              //  $name=$name+1;
		$pid.=$row['product_id'].",";
                $quan=$row['quantity'] + $quan;
                $fp=$row['totalprice'];
                $pri = $pri + $fp;
        }
}
echo $pid;
echo $quan;
$query="SELECT * FROM `orderdetails`";
$query_run=mysql_query($query);
if($query_run)
{
        while($row=mysql_fetch_assoc($query_run))
        {
		$name = $name +1;
                $id=$row['order_id'];
        }
}

$date=date("Y-m-d");
echo $date;
echo $name;
$query="UPDATE `Cloth`.`orderdetails` SET `orderdetails`.`products`='$pid' , `orderdetails`.`quantity`='$quan' WHERE `orderdetails`.`order_id`= $id ";
//$query="UPDATE `orderdetails` SET `products`=$pid, `quantity`=$quan WHERE `order_id`=$id";
//echo $query;
$query_run=mysql_query($query);
if($query_run)
	echo $query_run;

$query1="INSERT INTO payment (`payment_id`, `purchasedate`, `order_id`, `totalprice`,`cashgiven`,`difference`) VALUES (NULL,'$date', '$id', '$pri','0','0')";
$query_run1=mysql_query($query1);
//$query2="DELETE FROM `orders`";	
//$query_run=mysql_query($query2);
if($query_run)
{
       // $newURL='cash.php';
       	//header('Location: '.$newURL);

}
else{
echo mysql_error();
}
?>


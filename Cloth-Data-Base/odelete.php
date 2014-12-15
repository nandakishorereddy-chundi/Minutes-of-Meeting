<?php
include('connect.php');
$id=$_POST['id'];
$cnt=0;
$query="DELETE FROM `offer` WHERE `product_id`='$id'";
$query_run=mysql_query($query);
$temp=mysql_affected_rows();
if($temp > 0)
{
$query="SELECT * FROM `products` WHERE `product_id` ='$id' ";
$query_run=mysql_query($query);
if($query_run)
{
        while($row=mysql_fetch_assoc($query_run))
        {
                $up=$row['unitprice'];
                $cnt=$cnt+1;   
        	$up = $up / 0.9;
	}
}
if($cnt)
{
        $query = "UPDATE `Cloth`.`products` SET `products`.`unitprice`='$up' WHERE `products`.`product_id`= $id ";
        $query_run=mysql_query($query);
}
if($query_run=mysql_query($query))
{
         echo '<script type="text/javascript">';
 echo 'alert("Offer Deleted Sucessfully");';
 echo 'window.location.href = "offer.php";';
 echo '</script>';
//$newURL="offer.php";
//header('Location: '.$newURL);
}
}
else 
{
         echo '<script type="text/javascript">';
 echo 'alert("INcorrect Id");';
 echo 'window.location.href = "offer.php";';
 echo '</script>';
}
?>


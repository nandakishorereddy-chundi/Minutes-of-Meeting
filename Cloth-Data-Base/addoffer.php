<?php
include('connect.php');
$pid=$_POST['pid'];
$start=$_POST['start'];
$end=$_POST['end'];
$cnt=0;
$date=date("Y-m-d");
$query="SELECT * FROM `products` WHERE `product_id` ='$pid' ";
$query_run=mysql_query($query);
@$temp=mysql_num_rows($query_run);
if($query_run && $temp>0)
{
        while($row=mysql_fetch_assoc($query_run))
        {
		$up=$row['unitprice'];
                $cnt=$cnt+1;
        }
	$up =0.9 * $up;
}
if($cnt && $start < $end && $end > $date && $start >= $date && $temp>0)
{
	$query = "UPDATE `Cloth`.`products` SET `products`.`unitprice`='$up' WHERE `products`.`product_id`= $pid ";
	$query_run=mysql_query($query);

	$query="INSERT INTO offer (`product_id`, `startdate`, `enddate`, `offerflag`) VALUES ('$pid', '$start', '$end','1')";
	$query_run=mysql_query($query);
	         echo '<script type="text/javascript">';
 echo 'alert("Offer added Sucessfully");';
 echo 'window.location.href = "offer.php";';
 echo '</script>';
	//echo "charan";
}
else
{
         echo '<script type="text/javascript">';
 echo 'alert("Offer  not added");';
 echo 'window.location.href = "offer.php";';
 echo '</script>';
}
//$newURL="offer.php";
//header('Location: '.$newURL);
?>


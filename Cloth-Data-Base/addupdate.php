<?php
include('connect.php');
$pid=$_POST['id'];
$start=$_POST['start'];
$end=$_POST['end'];
$cnt=0;
$date=date("Y-m-d");
$query="SELECT * FROM `products` WHERE `product_id` ='$pid' ";

$query_run=mysql_query($query);
$tem=mysql_num_rows($query_run);
if($query_run && $tem>0)
{
        while($row=mysql_fetch_assoc($query_run))
        {
     //          $up=$row['unitprice'];
                $cnt=$cnt+1;
        }
       // $up = 0.9 * $up;
}
if($cnt && $start < $end && $end > $date && $start >= $date  && $tem>0)
{
//        $query = "UPDATE `Cloth`.`products` SET `products`.`unitprice`='$up' WHERE `products`.`product_id`= $pid ";
  //     $query_run=mysql_query($query);
	$query = "UPDATE `Cloth`.`offer` SET `offer`.`startdate`='$start' ,`offer`.`enddate`= '$end' WHERE `offer`.`product_id`= $pid ";
       // $query="INSERT INTO offer (`product_id`, `startdate`, `enddate`, `offerflag`) VALUES ('$pid', '$start', '$end','1')";
        $query_run=mysql_query($query);
	  echo '<script type="text/javascript">';
	 echo 'alert("Offer Edited Sucessfully");';
	 echo 'window.location.href = "offer.php";';
	 echo '</script>';

        //echo "charan";
}
else
{
	  echo '<script type="text/javascript">';
	 echo 'alert("Offer Not Updated");';
	 echo 'window.location.href = "offer.php";';
	 echo '</script>';

}
//$newURL="offer.php";
//header('Location: '.$newURL);
?>


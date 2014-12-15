<head>
<link href="css/elements.css" rel="stylesheet">
<script src="js/my_js.js"></script>
<?php
include('connect.php');
$cid=$_POST['customer_id'];
$cnt=0;
$query="SELECT * FROM `customers` WHERE `customer_id` ='$cid' ";
$query_run=mysql_query($query);
if($query_run)
{
        while($row=mysql_fetch_assoc($query_run))
        {
                $cnt=$cnt+1;
        }
}
if($cnt)
{
		$query="INSERT INTO `orderdetails`(`customer_id`) VALUES ('$cid')";
		$query_run=mysql_query($query);
  	 	echo '<script type="text/javascript">';
	 	echo 'alert("Customer Id entered sucessfully");';
		echo 'window.location.href = "orders.php";';
		 echo '</script>';

//$newURL="orders.php";
//header('Location: '.$newURL);
}
else
{
   echo '<script type="text/javascript">';
 echo 'alert("Incorrect Customer Id");';
 echo 'window.location.href = "orders1.php";';
 echo '</script>';

//$newURL="orders1.php";
//header('Location: '.$newURL);

}
?>


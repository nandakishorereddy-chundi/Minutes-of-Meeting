<?php
include('connect.php');
$id=$_POST['id'];
$query="DELETE FROM `orderdetails` WHERE `customer_id`='$id'";
$query_run=mysql_query($query);
@$row1=mysql_affected_rows();
$query="DELETE FROM `customers` WHERE `customer_id`='$id'";
$query_run=mysql_query($query);
@$row=mysql_affected_rows();
if($query_run && $row>0)
{
	if($query_run)
	{
        while($row=mysql_fetch_assoc($query_run))
        {
                $oid=$row['order_id'];

        }
	if ($row1>0)
	{
	 $query="SELECT * FROM `orderdetails` WHERE  `customer_id`='$id'";
        $query_run=mysql_query($query);

	$query="DELETE FROM `payment` WHERE `order_id`='$oid'";
	$query_run=mysql_query($query);
	}
}
	 echo '<script type="text/javascript">';
 echo 'alert("Id Deleted Sucessfully");';
 echo 'window.location.href = "cashier.php";';
 echo '</script>';

//	$newURL="cashier.php";
//	header('Location: '.$newURL);
//echo $query_run;
}
else
{
			echo '<script type="text/javascript">'; 
			echo 'alert("Incorrect Id");'; 
			echo 'window.location.href = "cashier.php";';
			echo '</script>';
			echo "charan";
}

?>


<?php
include('connect.php');
$id=$_POST['id'];
$query="DELETE FROM `payment` WHERE `payment_id`='$id'";
$query_run=mysql_query($query);
@$row=mysql_affected_rows();
if($query_run && $row > 0)
{
	$newURL="payment.php";
	header('Location: '.$newURL);
	echo $query_run;
}
else
{
			echo '<script type="text/javascript">'; 
			echo 'alert("Incorrect Id");'; 
			echo 'window.location.href = "payment.php";';
			echo '</script>';
			echo "charan";
}

?>


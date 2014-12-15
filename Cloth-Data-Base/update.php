<?php
include('connect.php');
$id=$_POST['customer_id'];
$fname=$_POST['name'];
$phone_no=$_POST['phone_no'];
//echo $id;
//$query= "UPDATE `customers` SET `name`= $fname , `phone_no`= $phone_no WHERE `customer_id` = $id ";
$query = "UPDATE `Cloth`.`customers` SET `customers`.`name`='$fname', `customers`.`phone_no`='$phone_no' WHERE `customers`.`customer_id`= $id ";
$query_run=mysql_query($query);
@$temp=mysql_num_rows($query_run, 0);
if($query_run)
{
	         echo '<script type="text/javascript">';
 	echo 'alert("Updated Sucessfully");';
 echo 'window.location.href = "cashier.php";';
 echo '</script>';
	//$newURL="cashier.php";
	//header('Location: '.$newURL);

}
else{
         echo '<script type="text/javascript">';
 echo 'alert("NOT updated ");';
 echo 'window.location.href = "cashier.php";';
 echo '</script>';
echo mysql_error(); 
//echo "hello";
}
?>

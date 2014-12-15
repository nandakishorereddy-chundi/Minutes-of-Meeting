<?php
include('connect.php');
$fname=$_POST['name'];
$phone_no=$_POST['phone_no'];
if($fname!="" && $phone_no!="")
{
$query="INSERT INTO `customers` (`customer_id`, `name`, `phone_no`) VALUES (NULL, '$fname','$phone_no')";
$query_run=mysql_query($query);
         echo '<script type="text/javascript">';
 echo 'alert("Id Entered Sucessfully");';
echo 'window.location.href = "cashier.php";';
 echo '</script>';
}
else
{
         echo '<script type="text/javascript">';
 echo 'alert("Incorrect Details");';
 echo 'window.location.href = "cashier.php";';
 echo '</script>';
}
//$newURL="cashier.php";
//header('Location: '.$newURL);
?>

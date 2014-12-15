<?php
include('connect.php');
$fname=$_POST['name'];
$phone_no=$_POST['phone_no'];
$query="DELETE FROM `customers` WHERE `name`=$fname"?
$query_run=mysql_query($query);
$newURL="cashier.php";
header('Location: '.$newURL);
?>


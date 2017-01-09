<?php
session_start();
	include "include/conn.php";
$order_id = filter_input(INPUT_GET,'id');
$sql = "select order_status from orders where order_id='$order_id' ";
			$result = $db->query($sql);
			$row = $result->fetch_array();
			$order_status=$row['order_status'];
$sql2="UPDATE orders set order_status='2' where order_id ='$order_id'";
$db->query($sql2);
header('location: buy.php');
?>
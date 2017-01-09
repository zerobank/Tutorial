<?php
session_start();
include "include/conn.php";
$email = $_SESSION['email'];
$product_id = filter_input(INPUT_GET,'id');
	$psize = filter_input(INPUT_GET,'psize');
	$qty = filter_input(INPUT_GET,'qty');
	$sql="delete from tmp_order where email='$email' and product_id ='$product_id' and psize='$psize' and qty='$qty'";
	$db->query($sql);
	header('location: cart.php');
	
?>
<?php
	include '../database_connect.php';
	
	$delid = $_GET['id'];
	$sql = ' DELETE FROM `registration` WHERE id = '.$delid.' ';
	mysqli_query($conn, $sql);
	header('location: customer_list.php');
?>
<?php
	include '../database_connect.php';
	
	$delid = $_GET['id'];
	$sql = ' DELETE FROM `newsletter` WHERE id = '.$delid.' ';
	mysqli_query($conn, $sql);
	header('location: newsletter.php');
?>
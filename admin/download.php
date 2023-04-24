<?php
	include '../database_connect.php';
	$viewid=$_GET['id'];
	$stmt=mysqli_query($conn,"SELECT transactionSS FROM customer_booking WHERE id=$viewid");
	$count=mysqli_num_rows($stmt);
	if($count>0){
		$row=mysqli_fetch_array($stmt);
		$image=$row['transactionSS'];
		$file='screenshot'.$image;
		
		if(headers_sent()){
			
		}
		else{
			ob_end_clean();
			header("Content-Type:application/image");
			header("Content-Disposition: attachment; filename=\"".basename($file)."\"");
			readfile($file);
			exit();
		}
	}
	else{
		
	}
?>
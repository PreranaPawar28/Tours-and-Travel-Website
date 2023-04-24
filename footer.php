<?php include 'cache.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css?v=<?=$version?>">
	<link rel="stylesheet" type="text/css" href="./css/all.css?v=<?=$version?>"> <!-- Offline Icons File Link -->
	<title>Document</title>
</head>
<body>
	<?php	
		include 'database_connect.php';
	?>

	<div class="footer">
		<div class="outer-box">
			<div class="inner-box">
				<div class="inner-links">
					<h3 class="">Quick links</h3>
					<a href="index.php"><i class="fas fa-angle-right"></i> Home</a>
					<a href="#"><i class="fas fa-angle-right"></i> About</a>
					<a href="packages.php"><i class="fas fa-angle-right"></i> Package</a>
					<a href="book.php"><i class="fas fa-angle-right"></i> Booking</a>
				</div>
			</div>
			<div class="inner-box">		
				<div class="inner-links">
					<h3>Extra links</h3>
					<a href="#"><i class="fas fa-angle-right"></i> Ask quetion</a>
					<a href="#"><i class="fas fa-angle-right"></i> About us</a>
					<a href="#"><i class="fas fa-angle-right"></i> Privacy policy</a>
					<a href="#"><i class="fas fa-angle-right"></i> Terms of use</a>
				</div>
			</div>
			<div class="inner-box inner-space">
				<div class="inner-links">
					<h3>Contact info</h3>
					<a href="#"><i class="fas fa-phone"></i> +123 456 7890</a>
					<a href="#"><i class="fas fa-phone"></i> +111 222 3333</a>
					<a href="#"><i class="fas fa-envelope"></i> abc@gmail.com</a>
					<a href="#"><i class="fas fa-map"></i> Mumbai-400104</a>
				</div>
			</div>
			<div class="inner-box">
				<div class="inner-links">
					<h3>Follow us</h3>
					<a href="#"><i class="fab fa-facebook-f"></i> facebook</a>
					<a href="#"><i class="fab fa-twitter"></i> Twitter</a>
					<a href="#"><i class="fab fa-instagram"></i> Instagram</a>
					<a href="#"><i class="fab fa-linkedin"></i> Linkedin</a>
				</div>
			</div>
		</div>
		<div class="copyright">
			<h3>Copyright ©2023 Travels</h3>
		</div>
	</div>
	
	
	<!-- JavaScript File Link Start -->
		<script type="text/javascript" src="javascript\script.js?v=<?=$version?>"></script> 
	<!-- JavaScript File Link End -->
</body>
</html>
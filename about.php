<?php include 'cache.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css?v=<?=$version?>">
	<link rel="stylesheet" type="text/css" href="./css/all.css?v=<?=$version?>"> <!-- Icons File Link -->
	<title>Document</title>
</head>
<body>
	<?php	
		session_start();
		include 'database_connect.php';

		$text = $text1 = "";
		if(!isset($_SESSION['log'])){
			$text = "SIGN IN";
		}else{
			$text1 = "MY ACCOUNT";
		}
	?>
	
	<nav>
		<label for="logo">Travel</label>
		<input type="checkbox" id="check">
		<label for="check" id="icon">
			<i class="fas fa-bars"></i>
		</label>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a class="Active" href="about.php">About</a></li>
			<li><a href="index.php #service">Service</a></li>
			<li><a href="packages.php">Packages</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="user-panel/user-login.php"><?php echo $text; echo $text1; ?></a></li>
		</ul>
	</nav>
	<div class="aboutbg">
		<h3>ABOUT US</h3>
	</div>
	<div class="aboutus-container">
		<div class="about-img">
			<img src="images/about-bg.png">
		</div>
		<div class="about-content">
			<h4>Take A Look At Our Story</h4>
			<p>“Travel is the main thing you purchase that makes you more extravagant”. We, at ‘Travel'
			, swear by this and put stock in satisfying travel dreams that make you perpetually rich constantly.
			We have been moving excellent encounters for a considerable length of time through our cutting-edge
			planned occasion bundles and other fundamental travel administrations. We rouse our clients to carry
			on with a rich life, brimming with extraordinary travel encounters. Through our exceptionally curated
			occasion bundles. We need you to observe sensational scenes that are a
			long way past your creative ability.</p>
			<a href="packages.php">Book Your Destination</a>
		</div>
	</div>

	<?php include 'footer.php'; ?>
	<!-- JavaScript File Link Start -->
		<script type="text/javascript" src="javascript\script.js?v=<?=$version?>"></script> 
	<!-- JavaScript File Link End -->
</body>
</html>
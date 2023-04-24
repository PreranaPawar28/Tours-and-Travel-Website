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

		$sql = "SELECT * FROM packages";
		$all_product = mysqli_query($conn, $sql);
	?>
	
	<nav>
		<label for="logo">Travel</label>
		<input type="checkbox" id="check">
		<label for="check" id="icon">
			<i class="fas fa-bars"></i>
		</label>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="index.php #service">Service</a></li>
			<li><a class="Active" href="packages.php">Packages</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="user-panel/user-login.php"><?php echo $text; echo $text1; ?></a></li>
		</ul>
	</nav>
	
	<div class="packageBg">
		<div class="packages-opacity">
			<h3>PACKAGES</h3>
		</div>
	</div>

	<?php 
		while($row = mysqli_fetch_assoc($all_product)){
	?>
		<div class="block">
			<div class="packages">
				<div class="section1">
					<img src="<?php echo $row["image"] ?>" alt="">
				</div>
				<div class="section2">
					<div class="inner-section">
						<div class="heading">
							<h3><?php echo $row["title"] ?></h3>
						</div>
						<div class="review">
							<img src="images/ratingstar.png" width="15px" height="15px">
							<img src="images/ratingstar.png" width="15px" height="15px">
							<img src="images/ratingstar.png" width="15px" height="15px">
							<img src="images/ratingstar.png" width="15px" height="15px">
							<img src="images/halfstar.png" width="15px" height="15px">
							<h4>review</h4>
						</div>
						<div class="content">
							<h4><?php echo $row["description"] ?></h4>
						</div>
						<div class="btn">
							<a href="book.php?id=<?php echo $row["id"]?>">Buy this tour</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
		}
	?>

	<?php include 'footer.php'; ?>
	<!-- JavaScript File Link Start -->
		<script type="text/javascript" src="javascript\script.js?v=<?=$version?>"></script> 
	<!-- JavaScript File Link End -->
</body>
</html>
<?php include 'cache.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css?v=<?=$version?>">
	<link rel="stylesheet" type="text/css" href="./css/all.css?v=<?=$version?>"> <!-- Icons File Link -->
	<title>Document</title>
	
	<script>
        function redirect() {
			let url = "payment.php";
			window.location(url);
		}
    </script>
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
			<li><a href="about.php">About</a></li>
			<li><a href="index.php #service">Service</a></li>
			<li><a class="Active" href="packages.php">Packages</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="user-panel/user-login.php"><?php echo $text; echo $text1; ?></a></li>
		</ul>
	</nav>
	
	<div class="book-bg">
		<h3>BOOK NOW</h3>
	</div>
	<?php
		include 'database_connect.php';
		
		$view_id = $_GET['id'];
		$viewquery =  ' SELECT * FROM `packages` WHERE id = '.$view_id.' ';
		$query_run = mysqli_query($conn, $viewquery);
		
		if(mysqli_num_rows($query_run) > 0){
			$detail = mysqli_fetch_array($query_run);
	?>
					<div class="book-conatiner">
						<div class="book-img">
							<img src="<?=$detail['image'];?>" width="400px" height="300px">
							<img src="<?=$detail['image1'];?>" width="400px" height="300px">
							<img src="<?=$detail['image2'];?>" width="400px" height="300px">
							<img src="<?=$detail['image3'];?>" width="400px" height="300px">
							<img src="<?=$detail['image4'];?>" width="400px" height="300px">
				
						</div>
						<div class="book-content">
							<h3><?=$detail['title'];?></h3>
							<div class="content-desc">
								<h4>Description:</h4>
								<p><?=$detail['description'];?></p>
							</div>
							<div class="content-desc box-margin">
								<h4>Facilities:</h4>
								<p><?=$detail['facilities'];?></p>
							</div>
							<div class="book-btn">
								<a href="checkout.php?id=<?php echo $detail["id"]?>">Book Tour Now</a>
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
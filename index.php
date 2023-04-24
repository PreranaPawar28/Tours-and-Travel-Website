	<?php include 'cache.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css?v=<?=$version?>">
	<link rel="stylesheet" type="text/css" href="../css/all.css?v=<?=$version?>"> <!-- Icons File Link -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" /> <!-- Slider Link -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script> <!-- Counter Up JavaScript File -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script> <!-- Counter Up JavaScript File -->
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
		
		if(isset($_POST['newsletterbtn'])){
			if(!$_POST['newsletter']){
				$_SESSION['news-msg'] = '<span class="news-error">E-mail Adress is required!</span>';
			}
			if($_POST['newsletter'] && filter_var($_POST['newsletter'], FILTER_VALIDATE_EMAIL) === false){
				$_SESSION['news-msg1'] = '<span class="news-error">Enter a valid E-mail Address!</span>';
			}
			else{
				$useremail = mysqli_real_escape_string($conn, $_POST['newsletter']);
				$emailchk = "select * from newsletter where email = '$useremail' ";
				$query = mysqli_query($conn, $emailchk);
				$emailchk1 = mysqli_num_rows($query);
				
				if($emailchk1 > 0){
					$_SESSION['news-exist'] = '<span class="news-error">E-mail already exist!</span>';
				}
				if($useremail != ""){
					$insert = "insert into newsletter(email) values('$useremail')";
					$iquery = mysqli_query($conn, $insert);
					if($iquery == true){
						$_SESSION['news-success'] = '<span class="news-msg">Subscribed successfully!</span>';
					}else{
						$_SESSION['news-failed'] = '<span class="news-error">Failed to Subscribe!</span>';
					}
				}
			}
		}
		
		$sql = "SELECT * FROM packages order by id asc LIMIT 2 OFFSET 0";
		$all_product = mysqli_query($conn, $sql);
	?>
	<!-- Header Starts -->
	<nav>
		<label for="logo">Travel</label>
		<input type="checkbox" id="check">
		<label for="check" id="icon">
			<i class="fas fa-bars"></i>
		</label>
		<ul>
			<li><a class="Active" href="index.php">Home</a></li>
			<li><a href="about.php	">About</a></li>
			<li><a href="#service">Service</a></li>
			<li><a href="packages.php">Packages</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="user-panel/user-login.php"><?php echo $text; echo $text1; ?></a></li>
		</ul>
	</nav>
	<!-- Header Ends -->
	
	<!-- Swiper -->
	<div class="swiper mySwiper">
		<div class="swiper-wrapper">
			<div class="swiper-slide img1">
				<a href="packages.php">Book Now</a>
			</div>
			<div class="swiper-slide img2">
				<a href="packages.php">Book Now</a>
			</div>
			<div class="swiper-slide img3">
				<a href="packages.php">Book Now</a>
			</div>
			<div class="swiper-slide img4">
				<a href="packages.php">Book Now</a>
			</div>
			<div class="swiper-slide img5">
				<a href="packages.php">Book Now</a>
			</div>
			<div class="swiper-slide img6">
				<a href="packages.php">Book Now</a>
			</div>
			<div class="swiper-slide img7">
				<a href="packages.php">Book Now</a>
			</div>
			<div class="swiper-slide img8">
				<a href="packages.php">Book Now</a>
			</div>
		</div>
		<div class="swiper-pagination">
		</div>
	  </div>
	<!-- Swiper JS -->
	
	<!-- Our Services Part Starts -->
	<div class="our-service" id="service">
		<h4>Our Services</h4>
		<div class="service-box">
			<div class="service-content">
				<div class="service-icon">
					<img src="./images/control.png" width="36px" height="36px">
				</div>
				<div class="service-text">
					<h5>Personalized Matching</h5>
					<p>Our unique matching system lets you find just the tour you want
					for your next holiday.</p>
				</div>
			</div>
			<div class="service-content">
				<div class="service-icon">
					<img src="./images/medal.png" width="36px" height="36px" class="no-rotate">
				</div>
				<div class="service-text">
					<h5>Wide Variety of Tours</h5>
					<p>We offer a wide variety of personally picked tours with destinations all
					over the globe.</p>
				</div>
			</div>
			<div class="service-content">
				<div class="service-icon">
					<img src="./images/star.png" width="36px" height="36px" class="no-rotate">
				</div>
				<div class="service-text">
					<h5>Highly Qualified Service</h5>
					<p>Our tour managers are qualified, skilled, and friendly to bring you the best
					service.</p>
				</div>
			</div>
		</div>
		<div class="service-box1">
			<div class="service-content">
				<div class="service-icon">
					<img src="./images/support.png" width="36px" height="36px" class="no-rotate">
				</div>
				<div class="service-text">
					<h5>24/7 Support</h5>
					<p>You can always get professional support from our staff 24/7 and ask any question
					you have.</p>
				</div>
			</div>
			<div class="service-content">
				<div class="service-icon">
					<img src="./images/flame.png" width="36px" height="36px" class="no-rotate">
				</div>
				<div class="service-text">
					<h5>Handpicked Hotels</h5>
					<p>Our team offers only the best selection of affordable and luxury hotels to our
					clients.</p>
				</div>
			</div>
			<div class="service-content">
				<div class="service-icon">
					<img src="./images/wallet.png" width="36px" height="36px" class="no-rotate">
				</div>
				<div class="service-text">
					<h5>Best Price Guarantee</h5>
					<p>If you find tours that are cheaper than ours, we will compensate the
					difference.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Our Services Part Starts -->
	
	<!-- Book a Tour Now Part Starts -->
	<div class="book-container">
		<div class="book-opacity">
			<h3>First-class Impressions</h3>
			<h4>are Waiting for You!</h4>
			<p>Our agency offers travelers various tours and excursions with destinations all
			over India. Browse our website to find your dream tour!</p>
			<a href="packages.php">Book a Tour Now</a>
		</div>
	</div>
	<!-- Book a Tour Now Part Ends -->
	
	<div class="people-container">
	<?php 
		while($row = mysqli_fetch_assoc($all_product)){
	?>
		<div class="block">
			<div class="packages bg-packages">
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
	<div class="book-btn view-btn">
		<a href="packages.php">View More</a>
	</div>
	</div>
	
	<!-- Counter Part Starts -->
	<div class="counter-container">
		<h3>1 Year of Following The Dream</h3>
		<div class="counter-box">
			<div class="counter1">
				<div class="inner-content">
					<div class="num">
						<h3 class="counter">100</h3>
						<h3> +</h3>
					</div>
					<p>Travelers</p>
				</div>
			</div>
			<div class="counter2">
				<div class="inner-content">
					<div class="num">
						<h3 class="counter">500</h3>
						<h3> +</h3>
					</div>
					<p>Happy Travelers</p>
				</div>
			</div>
			<div class="counter3">
				<div class="inner-content">
					<h3 class="counter">25</h3>
					<p>Team Members</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Counter Part Ends -->
	
	<!-- Discount Part Starts -->
	<div class="discount">
		<div class="discount-opacity">
			<h2>Sign Up for 25% Discount</h2>
			<p>Want to get an instant discount for your next tour? Leave your email
			and sign up for our newsletter with 25% of all our offers.</p>
			<div class="newsletter">
				<form action="index.php" method="post" class="newsletter-form">
					<input type="text" placeholder="Enter Your E-mail" name="newsletter" class="email-input"/>
					<button type="submit" name="newsletterbtn">Subscribe</button>
				</form>
			</div>
			<?php
					if(isset($_SESSION['news-msg'])){
						echo $_SESSION['news-msg'];
						unset ($_SESSION['news-msg']);
					}
					if(isset($_SESSION['news-msg1'])){
						echo $_SESSION['news-msg1'];
						unset ($_SESSION['news-msg1']);
					}
					if(isset($_SESSION['news-exist'])){
						echo $_SESSION['news-exist'];
						unset ($_SESSION['news-exist']);
					}
					if(isset($_SESSION['news-success'])){
						echo $_SESSION['news-success'];
						unset ($_SESSION['news-success']);
					}
					if(isset($_SESSION['news-failed'])){
						echo $_SESSION['news-failed'];
						unset ($_SESSION['news-failed']);
					}
				?>
		</div>
	</div>
	<!-- Discount Part Ends -->
	
	<!-- Gallery Part Starts -->
		<div class="gallery">
			<h3>GALLERY</h3>
			<div class="swiper mySwiper1">
				<div class="swiper-wrapper">
				<div class="swiper-slide"><img src="upload/golden.jpg"></div>
				<div class="swiper-slide"><img src="upload/img.jpg"></div>
				<div class="swiper-slide"><img src="upload/goa.jpg"></div>
				<div class="swiper-slide"><img src="upload/img1.jpg"></div>
				<div class="swiper-slide"><img src="upload/img2.jpg"></div>
				<div class="swiper-slide"><img src="upload/taj2.jpeg"></div>
				<div class="swiper-slide"><img src="upload/unity.jpg"></div>
				<div class="swiper-slide"><img src="upload/fort1.jpg"></div>
				<div class="swiper-slide"><img src="upload/jal1.jpg"></div>
			</div>
		<div class="swiper-pagination"></div>
  </div>
		</div>
	<!-- Gallery Part Ends-->
	
	<?php include 'footer.php'; ?>
	
	<!-- JavaScript File Link Start -->
	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script> <!-- Slider Javascript File -->
	<script>
		var swiper = new Swiper(".mySwiper", {
				loop: true,
				speed: 1300,
				autoplay: {
					delay: 5000,
				},
				pagination: {
					el: ".swiper-pagination",
					dynamicBullets: true,
				},
			});
			
		var swiper = new Swiper(".mySwiper1", {
			slidesPerView: 3,
			spaceBetween: 30,
			loop: true,
			speed: 1000,
			autoplay: {
				delay: 3000,
			},
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
				dynamicBullets: true,
			},
		});
	</script>
	<script type="text/javascript" src="javascript\counterup.js?v=<?=$version?>"></script>		<!-- Counter Up File -->
	<script type="text/javascript" src="javascript\script.js?v=<?=$version?>"></script>
		
	<!-- JavaScript File Link End -->
</body>
</html>
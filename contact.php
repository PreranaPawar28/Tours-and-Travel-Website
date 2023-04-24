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

		if(isset($_POST['contactbtn'])){
			if(!$_POST['name']){
				$_SESSION['cnt-msg'] = '<span class="cnt-error">Name is required!</span>';
			}
			if(!$_POST['email']){
				$_SESSION['cnt-msg1'] = '<span class="cnt-error">E-mail is required!</span>';
			}
			if(!$_POST['phone']){
				$_SESSION['cnt-msg2'] = '<span class="cnt-error">Phone No is required!</span>';
			}
			if(strlen($_POST['phone'])<10){
				$_SESSION['cnt-msg3'] = '<span class="cnt-error">Phone No should be of 10 digits!</span>';
			}
			if(!$_POST['subject']){
				$_SESSION['cnt-msg4'] = '<span class="cnt-error">Subject is required!</span>';
			}
			if(!$_POST['message']){
				$_SESSION['cnt-msg5'] = '<span class="cnt-error">Message is required!</span>';
			}
			if($_POST['email'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
					$_SESSION['cnt-msg6'] = '<span class="cnt-error">Enter a valid E-mail Address!</span>';
				}
			else{
				include 'database_connect.php';
				$name = mysqli_real_escape_string($conn, $_POST['name']);
				$email = mysqli_real_escape_string($conn, $_POST['email']);
				$phone = mysqli_real_escape_string($conn, $_POST['phone']);
				$subject = mysqli_real_escape_string($conn, $_POST['subject']);
				$message = mysqli_real_escape_string($conn, $_POST['message']);
				
				if(!preg_match("/^[6-9]\d{9}$/",$_POST['phone'])){
					$_SESSION['cnt-msg7'] = '<span class="cnt-error">Invalid Phone No!</span>';
				}
				else{
					if($name != "" && $email != "" && $phone != "" && $subject != "" && $message != ""){
						$insertquery = "insert into contactus(name, email, mobileno, subject, message) values('$name', '$email', '$phone', '$subject', '$message')";
						$query = mysqli_query($conn, $insertquery);
						
						if($query == true){
							$_SESSION['cnt-success'] = '<span class="cnt-success">Message sent successfully!</span>';
						}else{
							$_SESSION['cnt-failed'] = '<span class="cnt-failed">Failed to sent Message!</span>';
						}
					}
				}
			}
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
			<li><a href="packages.php">Packages</a></li>
			<li><a class="Active" href="contact.php">Contact</a></li>
			<li><a href="user-panel/user-login.php"><?php echo $text; echo $text1; ?></a></li>
		</ul>
	</nav>
	
	<div class="contactbg">
		<h3>CONTACT US</h3>
	</div>
	<div class="contact-box">
		<h4>Get In Touch</h4>
		<p>If you have any questions, just fill in the contact form, and we will answer you shortly.</p>
		<div class="cnterror">
			<?php
				if(isset($_SESSION['cnt-msg'])){
					echo $_SESSION['cnt-msg'];
					unset ($_SESSION['cnt-msg']);
				}
				if(isset($_SESSION['cnt-msg1'])){
					echo $_SESSION['cnt-msg1'];
					unset ($_SESSION['cnt-msg1']);
				}
				if(isset($_SESSION['cnt-msg2'])){
					echo $_SESSION['cnt-msg2'];
					unset ($_SESSION['cnt-msg2']);
				}
				if(isset($_SESSION['cnt-msg3'])){
					echo $_SESSION['cnt-msg3'];
					unset ($_SESSION['cnt-msg3']);
				}
				if(isset($_SESSION['cnt-msg4'])){
					echo $_SESSION['cnt-msg4'];
					unset ($_SESSION['cnt-msg4']);
				}
				if(isset($_SESSION['cnt-msg5'])){
					echo $_SESSION['cnt-msg5'];
					unset ($_SESSION['cnt-msg5']);
				}
				if(isset($_SESSION['cnt-msg6'])){
					echo $_SESSION['cnt-msg6'];
					unset ($_SESSION['cnt-msg6']);
				}
				if(isset($_SESSION['cnt-msg7'])){
					echo $_SESSION['cnt-msg7'];
					unset ($_SESSION['cnt-msg7']);
				}
				if(isset($_SESSION['cnt-success'])){
					echo $_SESSION['cnt-success'];
					unset ($_SESSION['cnt-success']);
				}
				if(isset($_SESSION['cnt-failed'])){
					echo $_SESSION['cnt-failed'];
					unset ($_SESSION['cnt-failed']);
				}
			?>
		</div>
		<form action="contact.php" method="post" class="contact-form">
			<input type="text" placeholder="Your Name" name="name" class="contact-input">
			<input type="text" placeholder="E-mail" name="email" class="contact-input">
			<input type="text" placeholder="Phone" name="phone" class="contact-input" maxlength="10">
			<input type="text" placeholder="Subject" name="subject" class="contact-input">
			<textarea name="message" placeholder="Message" maxlength="300" row="10"></textarea>
			<div class="contact-btn">
				<button type="submit" name="contactbtn">SEND MESSAGE</button>
			</div>
		</form>
	</div>
	<?php include 'footer.php'; ?>
	<!-- JavaScript File Link Start -->
		<script type="text/javascript" src="javascript\script.js?v=<?=$version?>"></script> 
	<!-- JavaScript File Link End -->
</body>
</html>
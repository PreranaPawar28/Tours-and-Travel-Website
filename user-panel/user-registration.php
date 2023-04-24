<?php include '../cache.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/user-style.css?v=<?=$version?>">
	<link rel="stylesheet" type="text/css" href="../css/all.css?v=<?=$version?>"> <!-- Icons File Link -->
	<title>User-Registration</title>
</head>
<body>

	<?php
		session_start();
		if(isset($_POST['register'])){
			if(!$_POST['reg-fullname']){
				$_SESSION['reg-msg1'] = '<span class="reg-error">Full Name is required!</span>';
			}
			if(!$_POST['reg-username']){
				$_SESSION['reg-msg2'] = '<span class="reg-error">Username is required!</span>';
			}
			if(!$_POST['reg-email']){
				$_SESSION['reg-msg3'] = '<span class="reg-error">Email is required!</span>';
			}
			if(!$_POST['reg-phone']){
				$_SESSION['reg-msg4'] = '<span class="reg-error">Phone No is required!</span>';
			}
			if(strlen($_POST['reg-phone'])<10){
				$_SESSION['reg-msg'] = '<span class="reg-error">Phone No should be of 10 digits!</span>';
			}
			if(!$_POST['reg-pass']){
				$_SESSION['reg-msg5'] = '<span class="reg-error">Password is required!</span>';
			}
			if(!$_POST['reg-cpass']){
				$_SESSION['reg-msg6'] = '<span class="reg-error">Confirm Password is required!</span>';
			}
			if($_POST['reg-email'] && filter_var($_POST['reg-email'], FILTER_VALIDATE_EMAIL) === false){
				$_SESSION['reg-msg7'] = '<span class="reg-error">Enter a valid Email Address!</span>';
			}
			else{	
				include '../database_connect.php';
				$fullname = mysqli_real_escape_string($conn, $_POST['reg-fullname']);
				$username = mysqli_real_escape_string($conn, $_POST['reg-username']);
				$phone = mysqli_real_escape_string($conn, $_POST['reg-phone']);
				$email = mysqli_real_escape_string($conn, $_POST['reg-email']);
				$pass = mysqli_real_escape_string($conn, $_POST['reg-pass']);
				$cpass = mysqli_real_escape_string($conn, $_POST['reg-cpass']);
				
				$emailquery = "select * from registration where email = '$email' ";
				$query = mysqli_query($conn, $emailquery);
				$emailcount = mysqli_num_rows($query);
				
				if($emailcount > 0){
					$_SESSION['reg-exist'] = '<span class="reg-error">Email already exist!</span>';
				}
				if(!preg_match("/^[6-9]\d{9}$/",$_POST['reg-phone'])){
					$_SESSION['reg-msgphone'] = '<span class="reg-error">Invalid Phone No!</span>';
				}
				else{
					if($_POST['reg-pass'] === $_POST['reg-cpass']){
						if($fullname != "" && $username != "" && $email != "" && $phone != "" && $pass != "" && $cpass != ""){
							$insertquery = "insert into registration(fullname, username, mobileno, email, password, cpassword) values('$fullname', '$username', '$phone', '$email', '$pass', '$cpass')";
							$iquery = mysqli_query($conn, $insertquery);
							
							if($iquery == true){
								$_SESSION['reg-success'] = '<span class="success-msg">Account created successfully!</span>';
							}else{
								$_SESSION['reg-failed'] = '<span class="failed-msg">Failed to create account!</span>';
							}
						}
					}
					else{
						$_SESSION['reg-msg8'] = '<span class="reg-error">Password does not match!</span>';
					}
				}
			}
		}
	?>
	
	<div class="registration-container">
		<div class="registration-box1">
			<h4>Already have an account?</h4>
			<a href="user-login.php">Sign In</a>
		</div>
		<div class="registration-box2">
			<div class="registration-header2">
				<h4>Registration</h4>
				<p>Please fill in your info</p>
			</div>
			<div class="reg-container2">
				<?php
						if(isset($_SESSION['reg-msg'])){
							echo $_SESSION['reg-msg'];
							unset ($_SESSION['reg-msg']);
						}
						if(isset($_SESSION['reg-msg1'])){
							echo $_SESSION['reg-msg1'];
							unset ($_SESSION['reg-msg1']);
						}
						if(isset($_SESSION['reg-msg2'])){
								echo $_SESSION['reg-msg2'];
								unset ($_SESSION['reg-msg2']);
						}
						if(isset($_SESSION['reg-msg3'])){
								echo $_SESSION['reg-msg3'];
								unset ($_SESSION['reg-msg3']);
						}
						if(isset($_SESSION['reg-msg4'])){
								echo $_SESSION['reg-msg4'];
								unset ($_SESSION['reg-msg4']);
						}
						if(isset($_SESSION['reg-msgphone'])){
								echo $_SESSION['reg-msgphone'];
								unset ($_SESSION['reg-msgphone']);
						}
						if(isset($_SESSION['reg-msg5'])){
								echo $_SESSION['reg-msg5'];
								unset ($_SESSION['reg-msg5']);
						}
						if(isset($_SESSION['reg-msg6'])){
								echo $_SESSION['reg-msg6'];
								unset ($_SESSION['reg-msg6']);
						}
						if(isset($_SESSION['reg-msg7'])){
								echo $_SESSION['reg-msg7'];
								unset ($_SESSION['reg-msg7']);
						}
						if(isset($_SESSION['reg-msg8'])){
								echo $_SESSION['reg-msg8'];
								unset ($_SESSION['reg-msg8']);
						}
						if(isset($_SESSION['reg-exist'])){
							echo $_SESSION['reg-exist'];
							unset ($_SESSION['reg-exist']);
						}
						if(isset($_SESSION['reg-success'])){
							echo $_SESSION['reg-success'];
							unset ($_SESSION['reg-success']);
						}else{
							if(isset($_SESSION['reg-failed'])){
								echo $_SESSION['reg-failed'];
								unset ($_SESSION['reg-failed']);
							}
						}
					?>
				<form action="user-registration.php" method="post" class="registration-form">
					<div class="full-name common">
						<h5>Full Name</h5>
						<input type="name" name="reg-fullname" class="registration-input">
					</div>
					<div class="user common">
						<h5>Username</h5>
						<input type="name" name="reg-username" class="registration-input">
					</div>
					<div class="email common">
						<h5>Email</h5>
						<input type="email" name="reg-email" class="registration-input">
					</div>
					<div class="number common">
						<h5>Phone no.</h5>
						<input type="text" name="reg-phone" class="registration-input" maxlength="10" onkeypress = 'return keypresshandler(event)'>
					</div>
					<div class="password common">
						<h5>Password</h5>
						<input type="password" name="reg-pass" class="registration-input">
					</div>
					<div class="cpassword common">
						<h5>Confirm Password</h5>
						<input type="password" name="reg-cpass" class="registration-input">
					</div>
					<div class="btn">
						<button type="submit" name="register">SIGN UP</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script>
		 function keypresshandler(event)
		{
			var charCode = event.keyCode;
			//Non-numeric character range
			if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		}
	</script>
	



	<!-- JavaScript File Link Start -->
		<script type="text/javascript" src="javascript\script.js?v=<?=$version?>"></script> 
	<!-- JavaScript File Link End -->
</body>
</html>
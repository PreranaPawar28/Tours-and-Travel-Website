<?php include '../cache.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/user-style.css?v=<?=$version?>">
	<link rel="stylesheet" type="text/css" href="../css/all.css?v=<?=$version?>"> <!-- Icons File Link -->
	<title>Document</title>
</head>
<body>
	<?php
		session_start();
		if(isset($_SESSION['log'])){
			header ('location: user-panel.php');
		}
		if(isset($_POST['loginbtn'])){
			if(!$_POST['loginuser']){
				$_SESSION['msg1'] = '<span class="error-msg msg-space">Email Adress is required!</span>';
			}
			if(!$_POST['userpassword']){
				$_SESSION['msg2'] = '<span class="error-msg">Password is required!</span>';
			}
			if($_POST['loginuser'] && filter_var($_POST['loginuser'], FILTER_VALIDATE_EMAIL) === false){
				$_SESSION['msg3'] = '<span class="error-msg">Enter a valid Email Address!</span>';
			}
			else{
				include '../database_connect.php';
				$username = ($_POST['loginuser']);
				$userpass = ($_POST['userpassword']);
				$sql = "select * from  registration where email = '$username' && password = '$userpass' ";
				$result = mysqli_query($conn, $sql);
				$num = mysqli_num_rows($result);
				
				
				$emailquery = "select * from registration where email = '$username' ";
				$query = mysqli_query($conn, $emailquery);
				$emailcount = mysqli_num_rows($query);
				
				if($emailcount != 1){
					$_SESSION['msg4'] = '<span class="error-msg">Email doesnt exist!</span>';
				}
				if($num == 1){
					$_SESSION['log'] = 'true';
					$fetch = mysqli_fetch_assoc($result);
					$_SESSION['username'] = $fetch['username'];
					$_SESSION['UserEmail'] = $fetch['email'];
					$_SESSION['mobile'] = $fetch['mobileno'];
					$_SESSION['fullname'] = $fetch['fullname'];
					$_SESSION['password'] = $fetch['password'];
					header('location: user-panel.php');
				}
			}
		}
	?>
	
	<div class="login-container">
		<div class="login-box1">
			<div class="login-header">
				<h4>Login</h4>
				<p>Please fill in your info</p>
			</div>
			<div class="container1">
				<?php
						if(isset($_SESSION['msg1'])){
							echo $_SESSION['msg1'];
							unset ($_SESSION['msg1']);
						}
						if(isset($_SESSION['msg2'])){
							echo $_SESSION['msg2'];
							unset ($_SESSION['msg2']);
						}
						if(isset($_SESSION['msg3'])){
							echo $_SESSION['msg3'];
							unset ($_SESSION['msg3']);
						}
						if(isset($_SESSION['msg4'])){
							echo $_SESSION['msg4'];
							unset ($_SESSION['msg4']);
						}
					?>
				<form action="user-login.php" method="post" class="login_form">
					<div class="user-container common">
						<h5>Email ID</h5>
						<input type="text" name="loginuser" class="login-input"/>
					</div>	
					<div class="pass-container common">
						<h5>Password</h5>
						<input type="password" name="userpassword" class="login-input"/>
					</div>
					<div class="login_btn">
						<button type="submit" name="loginbtn">LOGIN</button>
					</div>
				</form>
				<p>Don't have an account? <a href="user-registration.php">Sign Up</a></p>
			</div>
		</div>
		<div class="login-box2">
			<div class="login-header1">
				<h4>Sign Up</h4>
				<p>Login with Social Media</p>
			</div>
			<div class="container2 conatiner-height">
				<div class="social-tab">
					<div class="social">
						<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
					</div>
					<div class="social">
						<a href="#"><i class="fa-brands fa-twitter"></i></i></a>
					</div>
					<div class="social">
						<a href="#"><i class="fa-brands fa-instagram"></i></i></a>
					</div>
				</div>
				<div class="social-title">
					<h5>Facebook</h5>
					<h5>Twitter</h5>
					<h5>Instagram</h5>
				</div>
			</div>
		</div>
	</div>
	
	<!-- JavaScript File Link Start -->
		<script type="text/javascript" src="javascript\script.js?v=<?=$version?>"></script> 
	<!-- JavaScript File Link End -->
</body>
</html>
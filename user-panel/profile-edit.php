<?php 
	include '../cache.php'; 
	session_start();
?>
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
		if(!isset($_SESSION['log'])){
			header('location: user-login.php');
		}

		include '../database_connect.php';
		
		if(isset($_POST['confirmbtn'])){
			if(!$_POST['username']){
				$_SESSION['confirm-msg'] = '<span class="confirm-error">Username is required!</span>';
			}
			if(!$_POST['usermobile']){
				$_SESSION['confirm-msg2'] = '<span class="confirm-error">Mobile No is required!</span>';
			}
			if(strlen($_POST['usermobile'])<10){
				$_SESSION['confirm-msg3'] = '<span class="confirm-error">Mobile No should be of 10 digits!</span>';
			}
			if(!$_POST['userpassword']){
				$_SESSION['confirm-msg4'] = '<span class="confirm-error">Password is required!</span>';
			}
			if(!$_POST['usercpassword']){
				$_SESSION['confirm-msg5'] = '<span class="confirm-error">Confirm Password is required!</span>';
			}
			else{
				$clientid = mysqli_real_escape_string($conn, $_POST['userid']);
				$clientname = mysqli_real_escape_string($conn, $_POST['username']);
				$clientmobile = mysqli_real_escape_string($conn, $_POST['usermobile']);
				$clientpass = mysqli_real_escape_string($conn, $_POST['userpassword']);
				$clientcpass = mysqli_real_escape_string($conn, $_POST['usercpassword']);	
				
				if(!preg_match("/^[6-9]\d{9}$/",$_POST['usermobile'])){
					$_SESSION['confirm-msgphone'] = '<span class="confirm-error">Invalid Phone No!</span>';
				}
				else{
					if($_POST['userpassword'] === $_POST['usercpassword']){
						if($clientname != "" && $clientmobile != "" && $clientpass != "" && $clientcpass != ""){
						
							$insert = "UPDATE registration SET id='$clientid', username='$clientname', mobileno='$clientmobile', password='$clientpass', cpassword='$clientcpass'  WHERE email = '{$_SESSION['UserEmail']}' ";
							$sqlquery1 = mysqli_query($conn,$insert);
						
							if($sqlquery1==true){
								header('location: user-panel.php');
							}
							else{
								$_SESSION['confirm-failed'] = '<span class="confirm-error">Failed to Update Data</span>';
							}
						}
					}
					else{
						$_SESSION['confirm-msg7'] = '<span class="confirm-error">Password does not match!</span>';
					}
				}

			}
		}
	?>

	<div class="side-bar">
		<div class="cmp-name">
			<h1>User Panel</h1>
		</div>
		<ul id="dropmenu">
			<li>
				<label><a class="user-dash" href="user-panel.php">Dashboard</a></label>
			</li>
			<li>
				<label for="first">History<i class="fa-solid fa-angle-down arrow1"></i></label>
				<input type="radio" name="firstacc" id="first">
				<div class="list">
					<a href="package-hist.php" class="links upper">Package History</a>
					<a href="contact-hist.php" class="links upper">Contact History</a>
					<a href="feedback-hist.php" class="links">Feedback History</a>
				</div>
			</li>
			
			<li>
				<label><a class="user-dash" href="feedback.php">Feedback</a></label>
			</li>
			
			<li>
				<label><a class="user-dash" href="logout.php">Logout</a></label>
			</li>
		<ul>
	</div>
	
	<div class="user-content">
		<div class="user-header">
			<div class="user-nav">
				<h2>Dashboard</h2>
			</div>
			<div class="user-nav1">
				<h3>Welcome <?php echo $_SESSION['username']; ?> !</h3>
				<a href="../index.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
			</div>
		</div>
		<div class="user-profile">
			<div class="title-box">
				<h3>Profile Update</h3>
			</div>
		</div>
		<div class="profile-edit">
		<?php
			$fetchdetails = "SELECT * from registration where email = '{$_SESSION['UserEmail']}'";
			$result = mysqli_query($conn,$fetchdetails);
			$fetch = mysqli_fetch_assoc($result);
			$userid = $fetch['id'];
			$username = $fetch['username'];
			$emailid = $fetch['email'];
			$mobileno = $fetch['mobileno'];
			$userpass = $fetch['password'];
			$cuserpass = $fetch['cpassword'];
		?>
			<form action="profile-edit.php" method="post" class="edit-form">
				<?php
					if(isset($_SESSION['confirm-msg'])){
						echo $_SESSION['confirm-msg'];
						unset ($_SESSION['confirm-msg']);
					}
					if(isset($_SESSION['confirm-msg2'])){
						echo $_SESSION['confirm-msg2'];
						unset ($_SESSION['confirm-msg2']);
					}
					if(isset($_SESSION['confirm-msg3'])){
						echo $_SESSION['confirm-msg3'];
						unset ($_SESSION['confirm-msg3']);
					}
					if(isset($_SESSION['confirm-msg4'])){
						echo $_SESSION['confirm-msg4'];
						unset ($_SESSION['confirm-msg4']);
					}
					if(isset($_SESSION['confirm-msg5'])){
						echo $_SESSION['confirm-msg5'];
						unset ($_SESSION['confirm-msg5']);
					}
					if(isset($_SESSION['confirm-msg7'])){
						echo $_SESSION['confirm-msg7'];
						unset ($_SESSION['confirm-msg7']);
					}
					if(isset($_SESSION['confirm-failed'])){
						echo $_SESSION['confirm-failed'];
						unset ($_SESSION['confirm-failed']);
					}
					if(isset($_SESSION['confirm-msgphone'])){
						echo $_SESSION['confirm-msgphone'];
						unset ($_SESSION['confirm-msgphone']);
					}
					if(isset($_SESSION['confirm-exist'])){
						echo $_SESSION['confirm-exist'];
						unset ($_SESSION['confirm-exist']);
					}
				?>
				<div class="profile1">
					<div class="profile-inner">
						<input type="text" value="<?php echo $userid; ?>"  name="userid" class="profile-input" hidden>
						<label>Full Name:</label>
						<input type="text" value="<?php echo $_SESSION['fullname']; ?>" readonly class="profile-input">
					</div>
					<div class="profile-inner">
						<label>Username:</label>
						<input type="text" value="<?php echo $username; ?>" name="username" class="profile-input">
					</div>
				</div>
				<div class="profile1">
					<div class="profile-inner">
						<label>Email:</label>
						<input type="text" value="<?php echo $emailid; ?>" readonly class="profile-input">
					</div>
					<div class="profile-inner">
						<label>Mobile No:</label>
						<input type="text" value="<?php echo $mobileno; ?>" onkeypress = 'return keypresshandler(event)' name="usermobile" maxlength="10" class="profile-input">
					</div>
				</div>
				<div class="profile1">
					<div class="profile-inner">
						<label>Password:</label>
						<input type="password" value="<?php echo $userpass; ?>" name="userpassword" class="profile-input">
					</div>
					<div class="profile-inner">
						<label>Confirm Password:</label>
						<input type="password" value="<?php echo $cuserpass; ?>" name="usercpassword" class="profile-input">
					</div>
				</div>
				<div class="profile1">
					<div class="profile-inner profile-btn">
						<button href="profile-edit.php" name="confirmbtn">Confirm</button>
					</div>
				</div>
			</form>
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
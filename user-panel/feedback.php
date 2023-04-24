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
		
		if(isset($_POST['submitbtn'])){
			if(!$_POST['feedtitle']){
				$_SESSION['submit-msg'] = '<span class="confirm-error">Title is required!</span>';
			}
			if(!$_POST['feedmessage']){
				$_SESSION['submit-msg1'] = '<span class="confirm-error">Title is required!</span>';
			}
			else{
				$clienttitle = mysqli_real_escape_string($conn, $_POST['feedtitle']);
				$clientemail = mysqli_real_escape_string($conn, $_POST['feedemail']);
				$clientdesc = mysqli_real_escape_string($conn, $_POST['feedmessage']);
				
				if($clienttitle != "" && $clientdesc != ""){
					$insertquery = "insert into feedback(title, email, description) values('$clienttitle', '$clientemail', '$clientdesc')";
					$iquery = mysqli_query($conn, $insertquery);
					
					if($iquery == true){
						$_SESSION['submit-success'] = '<span class="success-msg">Feedback Submitted successfully!</span>';
					}else{
						$_SESSION['submit-failed'] = '<span class="failed-msg">Failed to submit Feedback!</span>';
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
				<h3>Feedback</h3>
			</div>
		</div>
		<div class="feed-box">
		<?php
			$fetchdetails = "SELECT * from registration where email = '{$_SESSION['UserEmail']}'";
			$result = mysqli_query($conn,$fetchdetails);
			$fetch = mysqli_fetch_assoc($result);
			$emailid = $fetch['email'];
		?>
			<form action="feedback.php" method="post" class="feed-form">
				<?php
					if(isset($_SESSION['submit-msg'])){
						echo $_SESSION['submit-msg'];
						unset ($_SESSION['submit-msg']);
					}
					if(isset($_SESSION['submit-msg1'])){
						echo $_SESSION['submit-msg1'];
						unset ($_SESSION['submit-msg1']);
					}
					if(isset($_SESSION['submit-success'])){
						echo $_SESSION['submit-success'];
						unset ($_SESSION['submit-success']);
					}
					if(isset($_SESSION['submit-failed'])){
						echo $_SESSION['submit-failed'];
						unset ($_SESSION['submit-failed']);
					}
				?>
				<div class="feed-inner">
					<label>Title:</label>
					<input type="text" placeholder="Your Title" name="feedtitle" class="feed-input">
				</div>
				<div class="feed-inner">
					<label>Email:</label>
					<input type="text" value="<?php echo $emailid; ?>" name="feedemail" readonly name="feedtitle" class="feed-input">
				</div>
				<div class="feed-inner">
					<label>Description:</label>
					<textarea name="feedmessage" placeholder="Your Feedback" maxlength="300" row="10"></textarea>
				</div>
				<div class="feed-inner">
					<button href="feedback.php" name="submitbtn">Submit</button>
				</div>
			</form>
		</div>
	</div>
	
	
	<!-- JavaScript File Link Start -->
		<script type="text/javascript" src="javascript\script.js?v=<?=$version?>"></script> 
	<!-- JavaScript File Link End -->
</body>
</html>
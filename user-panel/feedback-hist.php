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
		
		$sql = "SELECT * FROM feedback where email='{$_SESSION['UserEmail']}' ";
		$all_list = mysqli_query($conn, $sql);
		
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
				<h3>Feedback History</h3>
			</div>
		</div>
		<div class="feed-hist-box">
			<?php
				while($row = mysqli_fetch_assoc($all_list)){
			?>
				<div class="feed-container">
					<h4>Title: <?php echo $row["title"] ?></h4>
					<p>Feedback: <?php echo $row["description"] ?></p>
				</div>
			<?php
				}
			?>
		</div>
		<div class="feed-space">
		</div>
	</div>
	
	
	<!-- JavaScript File Link Start -->
		<script type="text/javascript" src="javascript\script.js?v=<?=$version?>"></script> 
	<!-- JavaScript File Link End -->
</body>
</html>
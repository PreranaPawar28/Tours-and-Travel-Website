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
		
		$sql = "SELECT * FROM customer_booking where email='{$_SESSION['UserEmail']}' ";
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
				<h3>Package History</h3>
			</div>
		</div>
		<div class="packages-box">
			<?php
				while($row = mysqli_fetch_assoc($all_list)){
			?>
					<div class="packages-conatiner"><br>
						<div class="packages-content pkg-margin">
							<h5>Full Name:</h5>
							<p><?php echo $row['name']; ?></p>
							<h5>Email ID:</h5>
							<p><?php echo $row['email']; ?></p>
						</div>
						<div class="packages-content">
							<h5>Mobile No:</h5>
							<p><?php echo $row['mobile']; ?></p>
							<h5>Check In:</h5>
							<p><?php echo $row['checkin']; ?></p>
						</div>
						<div class="packages-content">
							<h5>Package Name:</h5>
							<p><?php echo $row['packagesname']; ?></p>
						</div>
						<div class="packages-content">
							<h5>Accommodation:</h5>
							<p><?php echo $row['accommodation']; ?></p>
						</div>
						<div class="packages-content">
							<h5>Adults:</h5>
							<p><?php echo $row['adults']; ?></p>
							<h5>Childs:</h5>
							<p><?php echo $row['childs']; ?></p>
						</div>
						<div class="packages-content">
							<h5>Package Price:</h5>
							<p>Rs <?php echo $row['price']; ?></p>
						</div>
						<div class="packages-content">
							<h5>Payment Mode:</h5>
							<p>UPI</p>
							<h5>Transaction ID:</h5>
							<p><?php echo $row['transaction']; ?></p>
						</div>
						<div class="packages-content">
							<h5>Transaction Screenshot:</h5>
							<a href="download.php?id=<?php echo $row['id'];?>">Download</a>
						</div>
						<div class="packages-content pkg-status">
							<h5>Status:</h5>
							<p><?php echo $row['status']; ?></p>
						</div>
						<br>
					</div>
			<?php
				}
			?>
		</div>
		<div class="pkg-space">
		</div>
	</div>
	
	
	<!-- JavaScript File Link Start -->
		<script type="text/javascript" src="javascript\script.js?v=<?=$version?>"></script> 
	<!-- JavaScript File Link End -->
</body>
</html>
<?php include '../cache.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/admin-style.css?v=<?=$version?>">
	<link rel="stylesheet" type="text/css" href="../css/all.css?v=<?=$version?>"> <!-- Icons File Link -->
	<title>Document</title>
</head>
<body>
	<?php
		session_start();
		if(!isset($_SESSION['admin-log'])){
			header('location: admin-login.php');
		}

		include '../database_connect.php';
		
	?>
	
	<div class="side-bar">
		<div class="cmp-name">
			<h1>Admin Panel</h1>
		</div>
		<ul id="dropdown">
			<li>
				<label><a class="admin-dash" href="admin-panel.php">Dashboard</a></label>
			</li>
			<li>
				<label><a class="admin-dash active" href="customer_list.php">Customer Profile</a></label>
			</li>
			<li>
				<label><a class="admin-dash" href="packages_list.php">Packages Booking</a></label>
			</li>
			<li>
				<label><a class="admin-dash" href="contact_form.php">Contact Form</a></label>
			</li>
			<li>
				<label><a class="admin-dash" href="feedback_form.php">Feedback Review</a></label>
			</li>
			<li>
				<label><a class="admin-dash" href="newsletter.php">Newsletter</a></label>
			</li>
			<li>
				<label><a class="admin-dash" href="logout.php">Logout</a></label>
			</li>
		<ul>
	</div>
	
	<div class="admin-container">
		<div class="admin-header">
			<div class="admin-nav">
				<h2>Dashboard</h2>
			</div>
			<div class="admin-nav1">
				<h3>Welcome <?php echo $_SESSION['adminuser']; ?> !</h3>
			</div>
		</div>
		<div class="hod-profile">
			<div class="title-box">
				<h3>Customer View</h3>
			</div>
		</div>
		<div class="profile-edit">
			<?php
				$cst_id = $_GET['id'];
				$query =  ' SELECT * FROM `registration` WHERE id = '.$cst_id.' ';
				$sqlquery = mysqli_query($conn,$query);
				
				if(mysqli_num_rows($sqlquery) > 0){
					$fetch = mysqli_fetch_array($sqlquery);
			?>
			<form action="customer-view.php" method="post" class="cst-form">
				<div class="profile1">
					<div class="profile-inner">
						<label>Full Name:</label>
						<input type="text" value="<?php echo $fetch['fullname']; ?>" readonly class="profile-input">
					</div>
					<div class="profile-inner">
						<label>Username:</label>
						<input type="text" value="<?php echo $fetch['username']; ?>" readonly class="profile-input">
					</div>
				</div>
				<div class="profile1">
					<div class="profile-inner">
						<label>Email:</label>
						<input type="text" value="<?php echo $fetch['email']; ?>" readonly class="profile-input">
					</div>
					<div class="profile-inner">
						<label>Mobile No:</label>
						<input type="text" value="<?php echo $fetch['mobileno']; ?>" readonly class="profile-input">
					</div>
				</div>
				<div class="profile1">
					<div class="profile-inner">
						<label>Password:</label>
						<input type="text" value="<?php echo $fetch['password']; ?>" readonly class="profile-input">
					</div>
				</div>
				<div class="profile1">
					<div class="profile-inner profile-btn">
						<a href="customer_list.php">Back</a>
					</div>
				</div>
			</form>
			<?php
				}
			?>
		</div>
	</div>
	
	<!-- JavaScript File Link Start -->
		<script type="text/javascript" src="javascript\script.js?v=<?=$version?>"></script> 
	<!-- JavaScript File Link End -->
</body>
</html>
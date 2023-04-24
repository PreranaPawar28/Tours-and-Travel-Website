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
		
		$sql = "SELECT * FROM registration";
		$display_list = mysqli_query($conn, $sql);
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
				<h3>Customer Profile</h3>
			</div>
		</div>
		<div class="customer-box">
			<ul class="customer-table">
				<li class="table-header">
					<div class="customer-col1">Sr.No</div>
					<div class="customer-col2">Client Name</div>
					<div class="customer-col3">Client Email</div>
					<div class="customer-col4">Action</div>
				</li>
				<?php
					$i = 1;
					while($row = mysqli_fetch_assoc($display_list)){
				?>
						<li class="table-row">
							<div class="customer-col1"><?php echo $i; $i++; ?></div>
							<div class="customer-col2"><?php echo $row["fullname"] ?></div>
							<div class="customer-col3"><?php echo $row["email"] ?></div>
							<div class="customer-col4 table-space">
								<a href="customer-view.php?id=<?php echo $row["id"]?>">View</a>
								<a href="customer-delete.php?id=<?php echo $row["id"]?>">Delete</a>
							</div>
						</li>
				<?php
					}
				?>
			</ul>
		</div>
	</div>
	
	<!-- JavaScript File Link Start -->
		<script type="text/javascript" src="javascript\script.js?v=<?=$version?>"></script> 
	<!-- JavaScript File Link End -->
</body>
</html>
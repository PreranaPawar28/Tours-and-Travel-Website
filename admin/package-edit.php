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
		
		
		
		
		if(isset($_POST['pkgupdate'])){
			$pkgid = mysqli_real_escape_string($conn, $_POST['pkgid']);
			$pkgstatus = mysqli_real_escape_string($conn, $_POST['pkgstatus']);
			
			$insert = "UPDATE customer_booking SET id='$pkgid', status='$pkgstatus' WHERE id = '$pkgid' ";
			$sqlquery1 = mysqli_query($conn,$insert);
			
			if($sqlquery1==true){
				header('location: packages_list.php');
			}
		}
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
				<label><a class="admin-dash" href="customer_list.php">Customer Profile</a></label>
			</li>
			<li>
				<label><a class="admin-dash active" href="packages_list.php">Packages Booking</a></label>
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
				<h3>Packages Booking Edit</h3>
			</div>
		</div>
		<div class="pkgedit-box">
			<?php
				if(isset($_GET['id'])){
					$viewid=$_GET['id'];
					$viewquery =  ' SELECT * FROM customer_booking WHERE id = '.$viewid.' ';
					$query = mysqli_query($conn, $viewquery);
					
					if(mysqli_num_rows($query) > 0){
					$fetch = mysqli_fetch_array($query);
			?>
			<form action="package-edit.php" method="post">
				<div class="profile1">
					<div class="profile-inner">
						<input type="text" readonly hidden name="pkgid" value="<?php echo $fetch['id']; ?>">
						<label>Package Status:</label>
						<select required name="pkgstatus">
							<option value="In Review" selected>In Review</option>
							<option value="Completed">Completed</option>
							<option value="Cancelled">Cancelled</option>
							<option value="Refund">Refund</option>
						</select>
					</div>
				</div>
				<div class="profile1">
					<div class="profile-inner profile-btn">
						<button type="submit" name="pkgupdate">Update</button>
					</div>
				</div>
			</form>
			<?php
				}
			}
			?>
		</div>
	</div>
	
	<!-- JavaScript File Link Start -->
		<script type="text/javascript" src="javascript\script.js?v=<?=$version?>"></script> 
	<!-- JavaScript File Link End -->
</body>
</html>
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
		if(isset($_SESSION['admin-log'])){
			header ('location: admin-panel.php');
		}
		if(isset($_POST['adminbtn'])){
			if(!$_POST['admin-username']){
				$_SESSION['admin-msg'] = '<span class="admin-error">Email Adress is required!</span>';
			}
			if(!$_POST['admin-password']){
				$_SESSION['admin-msg1'] = '<span class="admin-error">Password is required!</span>';
			}
			if($_POST['admin-username'] && filter_var($_POST['admin-username'], FILTER_VALIDATE_EMAIL) === false){
				$_SESSION['admin-msg2'] = '<span class="admin-error">Enter a valid Email Address!</span>';
			}
			else{
				include '../database_connect.php';
				$admin_id = ($_POST['admin-username']);
				$admin_pass = ($_POST['admin-password']);
				
				if($admin_id != "" && $admin_pass != ""){
					$sql = "select * from  adminlogin where email = '$admin_id' && password = '$admin_pass' ";
					$result = mysqli_query($conn, $sql);
					$num = mysqli_num_rows($result);
					
					$adminquery = "select * from adminlogin where email = '$admin_id' ";
					$query = mysqli_query($conn, $adminquery);
					$emailcount = mysqli_num_rows($query);
					
					if($emailcount != 1){
						$_SESSION['admin-msg3'] = '<span class="admin-error">Email doesnt exist!</span>';
					}
					if($num == 1){
						$_SESSION['admin-log'] = 'true';
						$fetch = mysqli_fetch_assoc($result);
						$_SESSION['adminuser'] = $fetch['name'];
						$_SESSION['adminemail'] = $fetch['email'];
						header('location: admin-panel.php');
					}
				}
			}
		}
	?>
	<div class="login-bg">
		<div class="admin-box">
			<div class="admin-icon">
				<i class="fa-solid fa-user"></i>
				<h4>Admin Login</h4>
			</div>
			<?php
				if(isset($_SESSION['admin-msg'])){
					echo $_SESSION['admin-msg'];
					unset ($_SESSION['admin-msg']);
				}
				if(isset($_SESSION['admin-msg1'])){
					echo $_SESSION['admin-msg1'];
					unset ($_SESSION['admin-msg1']);
				}
				if(isset($_SESSION['admin-msg2'])){
					echo $_SESSION['admin-msg2'];
					unset ($_SESSION['admin-msg2']);
				}
				if(isset($_SESSION['admin-msg3'])){
					echo $_SESSION['admin-msg3'];
					unset ($_SESSION['admin-msg3']);
				}
			?>
			<form action="admin-login.php" method="post" class="admin-form">
				<input type="text" placeholder="Email" name="admin-username" class="admin-input"/>
				<input type="password" placeholder="Password" name="admin-password" class="admin-input"/>	
				<div class="admin-btn">
					<button type="submit" name="adminbtn">LOGIN</button>
				</div>
			</form>
		</div>
	</div>
	
		
	
	<!-- JavaScript File Link Start -->
		<script type="text/javascript" src="javascript\script.js?v=<?=$version?>"></script> 
	<!-- JavaScript File Link End -->
</body>
</html>
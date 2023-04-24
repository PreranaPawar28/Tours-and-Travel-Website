<?php include 'cache.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css?v=<?=$version?>">
	<link rel="stylesheet" type="text/css" href="./css/all.css?v=<?=$version?>"> <!-- Icons File Link -->
	<title>Document</title>
	
	<script>
		function redirect() {
			let url = "book.php";
			window.location(url);
        }
    </script>
	
</head>
<body>
	<?php
		session_start();
		include 'database_connect.php';

		$text = $text1 = "";
		if(!isset($_SESSION['log'])){
			$text = "SIGN IN";
		}else{
			$text1 = "MY ACCOUNT";
		}
		
		if(!isset($_SESSION['log'])){
			header('location: user-panel\user-login.php');
		}
		
		if(isset($_POST['reservation'])){
				$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
				$username = mysqli_real_escape_string($conn, $_POST['username']);
				$email = mysqli_real_escape_string($conn, $_POST['email']);
				$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
				$accommodation = mysqli_real_escape_string($conn, $_POST['accommodation']);
				$check = date('Y-m-d',strtotime($_POST['checkin']));
				$clientno = mysqli_real_escape_string($conn, $_POST['adults']);
				$clientno1 = mysqli_real_escape_string($conn, $_POST['childs']);
				$chkprice = mysqli_real_escape_string($conn, $_POST['chkprice']);
				$transaction = mysqli_real_escape_string($conn, $_POST['transaction']);
				$packagesname = mysqli_real_escape_string($conn, $_POST['packagename']);
				$status = "In Review";
				
				$file = $_FILES['screenshot'];
				$filename = $file['name'];
				$filetmp = $file['tmp_name'];
				
				$fileext = explode('.',$filename);
				$filecheck = strtolower(end($fileext));
				
				$fileextstore = array('png', 'jpg', 'jpeg');
				
				if(in_array($filecheck,$fileextstore)){
					$destination = 'screenshot/'.$filename;
					move_uploaded_file($filetmp,$destination);
				}
				if($fullname != "" && $username != "" && $email != "" && $mobile != "" && $accommodation != "" && $clientno != "" && $clientno1 != "" && $chkprice != "" && $transaction != ""){
					$query = "insert into customer_booking (name, username, email, mobile, packagesname, accommodation, checkin, adults, childs, price, transaction, transactionSS, status)
					values ('$fullname', '$username', '$email', '$mobile', '$packagesname', '$accommodation', '$check', '$clientno', '$clientno1', '$chkprice', '$transaction', '$destination', '$status')";
					$result = mysqli_query($conn, $query);
					
					if($result == true){
						header('location: user-panel/package-hist.php');
					}else{
					
					}
				}
		}
	?>
	<nav>
		<label for="logo">Travel</label>
		<input type="checkbox" id="check">
		<label for="check" id="icon">
			<i class="fas fa-bars"></i>
		</label>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="index.php #service">Service</a></li>
			<li><a class="Active" href="packages.php">Packages</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="user-panel/user-login.php"><?php echo $text; echo $text1; ?></a></li>
		</ul>
	</nav>
	
	<div class="chk-bg">
		<h3>CHECKOUT</h3>
	</div>
	<?php
		$view_id = $_GET['id'];
		$viewquery =  ' SELECT * FROM `packages` WHERE id = '.$view_id.' ';
		$query_run = mysqli_query($conn, $viewquery);
		
		$fetch = mysqli_fetch_assoc($query_run);
		$clientid = $fetch['id'];
		$adultprice = $fetch['adultprice'];
		$childprice = $fetch['childprice'];
		$package = $fetch['title'];
		
		$fetchdetails = "SELECT * from registration where email = '{$_SESSION['UserEmail']}'";
		$result = mysqli_query($conn,$fetchdetails);
		$fetch1 = mysqli_fetch_assoc($result);
		
		$clientname = $fetch1['fullname'];
		$clientusername = $fetch1['username'];
		$clientemail = $fetch1['email'];
		$clientmobile = $fetch1['mobileno'];
	?>
	
	
	<div class="checkout-box">
		<div class="checkout-container">
			<h3>BOOKING INFO</h3>
			<form action="checkout.php" method="post" enctype="multipart/form-data">
				<div class="chk-details">
					<label>Full Name:</label>
					<input type="text" value="<?php echo $clientname; ?>" name="fullname" readonly>
				</div>
				<div class="chk-details">
					<label>Username:</label>
					<input type="text" value="<?php echo $clientusername; ?>" name="username" readonly>
				</div>
				<div class="chk-details">
					<label>Email Id:</label>
					<input type="text" value="<?php echo $clientemail; ?>" name="email" readonly>
				</div>
				<div class="chk-details">
					<label>Mobile No:</label>
					<input type="text" value="<?php echo $clientmobile; ?>" name="mobile" readonly>
				</div>
				<div class="chk-details">
					<label>Package Name:</label>
					<input type="text" value="<?php echo $package;?>" name="packagename" class="package-input" readonly>
				</div>
				<div class="chk-details">
					<label>Accommodation:</label>
					<input type="text" value="3 Days 2 Nights." name="accommodation" readonly>
				</div>
				<div class="chk-date">
					<label>Check-In:</label>
					<input type="date" name="checkin" required>
				</div>
				<div class="chk-member">
					<label>Adults:</label>
					<select class="form-control adult" id="adult" onchange="memberprice()" required>
						<option selected ></option>
						<option value="<?php echo $adultprice; ?>">1</option>
						<option value="<?php echo $adultprice*2; ?>">2</option>
						<option value="<?php echo $adultprice*3; ?>">3</option>
						<option value="<?php echo $adultprice*4; ?>">4</option>
						<option value="<?php echo $adultprice*5; ?>">5</option>
						<option value="<?php echo $adultprice*6; ?>">6</option>
						<option value="<?php echo $adultprice*7; ?>">7</option>
						<option value="<?php echo $adultprice*8; ?>">8</option>
						<option value="<?php echo $adultprice*9; ?>">9</option>
						<option value="<?php echo $adultprice*10; ?>">10</option>
					</select>
					<label>Child:</label>
					<select class="form-control child" id="child" onchange="memberprice()" required>
						<option selected ></option>
						<option value="0">0</option>
						<option value="<?php echo $childprice; ?>">1</option>
						<option value="<?php echo $childprice*2; ?>">2</option>
						<option value="<?php echo $childprice*3; ?>">3</option>
						<option value="<?php echo $childprice*4; ?>">4</option>
						<option value="<?php echo $childprice*5; ?>">5</option>
						<option value="<?php echo $childprice*6; ?>">6</option>
						<option value="<?php echo $childprice*7; ?>">7</option>
						<option value="<?php echo $childprice*8; ?>">8</option>
						<option value="<?php echo $childprice*9; ?>">9</option>
						<option value="<?php echo $childprice*10; ?>">10</option>
					</select>
					<input type="text" name="adults"   id="value1" hidden readonly>
					<input type="text" name="childs"  id="value2" hidden readonly>
				</div>
				<div class="chk-price">
					<label>Price (₹):</label>
					<input type="text" class="chkprice" readonly name="chkprice" id="chkprice">
				</div>
				<div class="chk-details">
					<label>Transaction Details:</label>
					<input type="text" readonly name="transaction" value="XXXXXXXXXX@paytm" id="chkprice">
				</div>
				<div class="chk-details">
					<label>Transaction Screenshot:</label>
					<input type="file" id="myFile" name="screenshot" required>
				</div>
				<div class="chkpg-btn">
					<a href="book.php?id=<?php echo $clientid; ?>">Back</a>
					<button type="submit" name="reservation">Confirm Reservation</button>
				</div>
			</form>
		</div>
	</div>		
	
	<?php include 'footer.php'; ?>
	
	<script>
		function memberprice(){
			var adult =  document.getElementById("adult");
			var child =   document.getElementById("child");
			
			var selFrst = adult.options[adult.selectedIndex].value;
			var selScnd = child.options[child.selectedIndex].value;
			
			var adlt = adult.options[adult.selectedIndex].text;
			var chld = child.options[child.selectedIndex].text;
			
			var totalCal = +selFrst + +selScnd;
			document.getElementById("chkprice").value = totalCal;
			document.getElementById("value1").value = adlt;
			document.getElementById("value2").value = chld;
			
			
		}
		
	</script>
	
	<!-- JavaScript File Link Start -->
		<script type="text/javascript" src="javascript\script.js?v=<?=$version?>"></script> 
	<!-- JavaScript File Link End -->
</body>
</html>
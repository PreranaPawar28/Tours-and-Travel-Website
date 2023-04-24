<?php include 'cache.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css?v=<?=$version?>">
	<link rel="stylesheet" type="text/css" href="./css/all.css?v=<?=$version?>"> <!-- Icons File Link -->
	<title>Document</title>
	
	<style>
		.package-form{
			width:80%;
			height:auto;
			margin:20px auto;
			display:flex;
			flex-direction:column;
		}
		
	</style>
</head>
<body>
	<?php
		include 'database_connect.php';
		session_start();
		if(isset($_POST['package'])){
			
			$title = mysqli_real_escape_string($conn, $_POST['title']);
			$description = mysqli_real_escape_string($conn, $_POST['description']);
			$price = mysqli_real_escape_string($conn, $_POST['price']);
			$location = mysqli_real_escape_string($conn, $_POST['location']);
			
			
			if($title != "" && $description != "" && $price != "" && $location != ""){
				$fileloc ="packages img/";
			
				$file1=$_FILES['image1']['name'];
				$file_tmp1=$_FILES['image1']['tmp_name'];
				
				$file2=$_FILES['image2']['name'];
				$file_tmp2=$_FILES['image2']['tmp_name'];
				
				$file3=$_FILES['image3']['name'];
				$file_tmp3=$_FILES['image3']['tmp_name'];
				
				$file4=$_FILES['image4']['name'];
				$file_tmp4=$_FILES['image4']['tmp_name'];
				
				$file5=$_FILES['image5']['name'];
				$file_tmp5=$_FILES['image5']['tmp_name'];
				
				$data=[];
				$data=[$file1,$file2,$file3,$file4,$file5];
				$image=implode(' ',$data);
				
				$fileextstore = array('png', 'jpg', 'jpeg');
				
				$query = "insert into  packages (title, description	, price, location, image) values ('$title', '$description', '$price', '$location', '$image')";
				$result = mysqli_query($conn, $query);
				
				if($result){
					move_uploaded_file($file_tmp1, $fileloc.$file1);
					move_uploaded_file($file_tmp2, $fileloc.$file2);
					move_uploaded_file($file_tmp3, $fileloc.$file3);
					move_uploaded_file($file_tmp4, $fileloc.$file4);
					move_uploaded_file($file_tmp5, $fileloc.$file5);
					echo "success";
				}
				else{
					echo "failed";
				}
			}
		}
	?>
	
		<form action="insert-packages-pg.php" method="post" enctype="multipart/form-data">
			<div class="package-form">
				<input type="text" placeholder="Package Title" name="title" required>
				<input type="text" placeholder="Package Description" name="description" required>
				<input type="text" placeholder="Package Price" name="price" required>
				<input type="text" placeholder="Package Location" name="location" required>
				<input type="file" id="myFile" name="image1" required>
				<input type="file" id="myFile" name="image2" required>
				<input type="file" id="myFile" name="image3" required>
				<input type="file" id="myFile" name="image4" required>
				<input type="file" id="myFile" name="image5" required>
				
				<button type="submit" name="package">submit</button>
			</div>
		
			

		</form>
<!-- JavaScript File Link Start -->
		<script type="text/javascript" src="javascript\script.js?v=<?=$version?>"></script> 
	<!-- JavaScript File Link End -->
</body>
</html>
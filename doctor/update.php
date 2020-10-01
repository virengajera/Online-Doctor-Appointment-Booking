<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link href="css/dashboard.css" rel="stylesheet">
	</head>
<body>


<?php


if(isset($_POST['submit']))
	{
			include("header.php");
			include('db.php');
			include("auth_session.php");


			
			$doctorname=$_POST['name'];
			$phoneno=$_POST['phone_no'];
			$speciality=$_POST['special'];
			$degree=$_POST['degree'];
			$experience=$_POST['exp'];
			$age=$_POST['age'];
			$fee=$_POST['fee'];
			$imagename = $_FILES['simg']['name'];
			$tempname = $_FILES['simg']['tmp_name'];
		
			move_uploaded_file($tempname,"doctorimg/$imagename");




			echo $id=$_SESSION['docid'];

		
		$sql = "UPDATE `doctorlogin` SET `doctorname` = '$doctorname' ,`phoneno`='$phoneno' ,`speciality`='$speciality' ,`degree`='$degree' , `experience`='$experience' ,`age`='$age' ,`fee`='$fee' ,`profile`='$imagename' WHERE `doctorid` = $id;";
		$execute1 = mysqli_query($con,$sql);
		if($execute1)
		{
			?>
			<script>
			alert("updated successfully");
			window.open('updateprofile.php','_SELF');
			</script>
			<?php
			
			
		}
		else
		{
			?>
			<script>
		
			alert("Enter data in right format");
			</script>
			
			<?php
		}
		
		
		
		
		
		$sql = "SELECT * FROM `doctorlogin` WHERE `doctorid`= $id;";
		$execute1 = mysqli_query($con,$sql);
		if($execute1)
		{
			$data = mysqli_fetch_assoc($execute1);
			?><pre><?php
			print_r($data);
			?>
			</pre><?php
			$doctorname=$data['doctorname'];
			$doctorname=$data['doctorname'];
			$phoneno=$data['phoneno'];
			$speciality=$data['speciality'];
			$degre=$data['degree'];
			$experience=$data['experience'];
			$age=$data['age'];
			$fee=$data['fee'];
}

		
		
	}

?>
<?php
	include('db.php');
	include('auth_session.php');
	$id=$_SESSION['labid'];
	echo $id;
	if(isset($_POST['submit']))
	{
			
		
			


			$phoneno=$_POST['phoneno'];
			$labname=$_POST['labname'];
			$username=$_POST['username'];
			$email=$_POST['email'];
			$labtype=$_POST['labtype'];
			$speciality=$_POST['speciality'];
			
			
			


   

		$sql = "UPDATE `laboratory` SET `labname` = '$labname', `username` = '$username', `email` = '$email', `phoneno` = '$phoneno', `labtype` = '$labtype', `speciality` = '$speciality' WHERE `id` = $id;";
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
			
			
			echo $id;
			?>
			<script>
		
			alert("enter details carefully Follow formats of each input");
			window.open('updateprofile.php','_SELF');
			</script>
			
			<?php
		}

		
		
	}
?>

<?php
	
	
	include('auth_session.php');
	$id = $_SESSION['report_id'];
	$type=$_GET['report_type'];
	$fee = $_GET['fee'];
	
	
	
	
	include('db.php');
	$qry = "UPDATE `reports` SET `report_type` = '$type', `fee` = '$fee' WHERE `reports`.`id` = $id;";
	$exe = mysqli_query($con,$qry);
	if($exe)
{
	?>
	<script>alert("Details uploaded successfully");
	window.open("reports.php","_SELF");</script>
	<?php
}
else
{
	echo "details not uploaded";
}


?>
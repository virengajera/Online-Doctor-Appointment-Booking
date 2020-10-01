<table>
</table>
<?php
	$area=$_GET['area'];
	$ar="%$area%";
	$qry = "SELECT * FROM `cliniclogin` WHERE `location` LIKE '%$area%'";
	include('db.php');
	$exe = mysqli_query($con,$qry); 
	while($data = mysqli_fetch_assoc($exe));
	{
		print_r($data);
		
	}
	
?>
<?php
include('auth_session.php');
$report_id = $_SESSION['report_id'];
include('db.php');

$report = $_FILES['rimg']['name'];
$temp = $_FILES['rimg']['tmp_name'];
move_uploaded_file($temp,"reports/$report");
$date = date('Y:m:d');
$status = "uploaded";
$qry = "UPDATE `reports` SET `report`='$report' ,report_status ='$status',report_upload_date='$date' WHERE `reports`.`id` =$report_id ;";
$exe = mysqli_query($con,$qry);
if($exe)
{
	?>
	<script>alert("Report uploaded successfully");
	window.open("reportsbyrange.php","_SELF");</script>
	<?php
}
else
{
	echo "file not uploaded";
}
?>
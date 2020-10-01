<?php 
include("auth_session.php");
include('db.php');
$lab_id = $_GET['value'];
$doctor_id = $_SESSION['docid'];
$appoinment =$_SESSION['appoinment_id'];
$client =$_SESSION['client_id'];
$date = date('Y:m:d');
if(isset($_GET['lab_select']))
{
	$qry = "INSERT INTO `reports` (`appoinmentid`, `doctorid`, `clientid`, `lab_id`, `report`, `report_type`, `date_of_request`, `report_status`, `report_upload_date`) VALUES (
									$appoinment, $doctor_id , $client, $lab_id , NULL, '', '$date', '', NULL);";
}	$execute = mysqli_query($con,$qry);
	if($execute)
	{
		
	?>
	<script>alert("laboratory details updated successfully");
			window.open('appointment.php','_SELF');
	</script>
			
	<?php
	}
	else
	{
		echo "error";
	}

?>
<?php
include('header.php');
include('auth_session.php');
?>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="css/editdetails.css" rel="stylesheet">
	</head>
</body>
	
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Lab area</title>
	<link href="css/dashboard.css" rel="stylesheet">
    
</head>
	
<div style="background:#b3dec1;padding:1px">
<p style="color : #750d37;font-size:25px;text-align:center;">Edit details</p>
</div>

<table border=1 width=80% >
	<tr  bgcolor ="#8db580" border="2px solid black" height="10px" align="center" >
		<th>No</th>
		<th>Report id</th>
		<th>appointment id</th>
		<th>client name</th>
		<th>doctor name</th>
		<th>report type</th>
		<th>report request date</th>
		<th>report upload status</th>
		<th>report upload date</th>
		<th>report fee</th>
		<th>Download Report</th>
	</tr>
	
<?php	
	function findclientname($id)
{
	$conn =  mysqli_connect("localhost","root","","de");
	$qry =  "SELECT * FROM `clientlogin` WHERE `clientid`='$id'";
	$ans = mysqli_query($conn,$qry);
	if($ans)
	{
		$nam=mysqli_fetch_assoc($ans);
		return $nam['clientname'];
	}
}
	function finddoctorname($id)
	{

	$conn =  mysqli_connect("localhost","root","","de");
	$qry =  "SELECT * FROM `doctorlogin` WHERE `doctorid`=$id";
	$ans = mysqli_query($conn,$qry);

	if($ans)
	{
		$nam=mysqli_fetch_assoc($ans);
		return $nam['doctorname'];
	}
	}
	
	?>
	
<?php
	$id = $_GET['report_id'];
	$_SESSION['report_id']=$id;
	$no=1;
	$lab_id = $_SESSION['labid'];
	include('db.php');
	$qry = "SELECT * FROM `reports` WHERE `id`=$id" ;
	$ans = mysqli_query($con,$qry);
	while($data = mysqli_fetch_assoc($ans))
	{
			
			?><tr><td><?php echo $no;$no++;?></td><?php
			?><td><?php echo $data['id'] ?></td><?php

			?><td><?php echo $data['appoinmentid'] ?></td><?php
			?><td><?php echo findclientname($data['clientid']); ?></td><?php
			?><td><?php echo finddoctorname($data['doctorid']); ?></td><?php
			?><td><?php echo $type = $data['report_type'] ?></td><?php
			?><td><?php echo $data['date_of_request'] ?></td><?php
			?><td><?php echo $data['report_status'] ?></td><?php
			?><td><?php echo $data['report_upload_date'] ?></td><?php
			?><td><?php echo $fee = $data['fee'] ?></td><?php
			?><td><a href="reports/<?php echo $data['report']?>">Click to download</a></td><?php
			
			
			
	}
	
?>
</table>

<div style="background:#b3dec1;padding:1px">
<p style="color : #750d37;font-size:25px;text-align:center;">Enter new details</p>
</div>



<section >
	<div >
		<form action="update_report_type_fee.php" method="get" class="form">
		<label class="innerblock">Report type:</label><input class="login-input" type="text" placeholder="Report type" name="report_type" value="<?php echo $type;?>" required><br>
		<label class="innerblock">Fee:</label><input class="login-input"  type="text" placeholder="fee" name="fee" value="<?php echo $fee; ?>" required><br>
		
		<span><input class="login-input btn" type= "submit" value = "submit" align="center"></span>
		</form>
	</div>

</section>

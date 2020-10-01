<?php
$start=$_GET['start_date'];
$_SESSION['s_date']=$start;
$end=$_GET['end_date'];
$_SESSION['e_date']=$end;
include('auth_session.php');
include('db.php');
$id = $_SESSION['labid'];
$query = " SELECT * FROM laboratory WHERE id=$id";
$exe = mysqli_query($con,$query);
if($exe)
{
	$data = mysqli_fetch_assoc($exe);
	 $labname = $data['labname'];
	 $username = $data['username'];
}
else
{
	echo "error in fetching name";
	
}
$date = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Today1s Report</title>
</head>
<body>
<div class="container-fluid pt-2 pb-2" style="background-color:rgba(209, 209, 170,0.3);">
    <div class="row">
        <div class="col-sm-9 ">
            <img  width="150" class="ml-0 mt-2 mb-2" src="../images/logo.png">
        </div>
        <div class="col-sm-3">
            <h3 class="mr-0">Hey, Labusername=<?php echo $username;?>!</h3>
			<h3 class="mr-0">Lab Name=<?php echo $labname;?></h3>
            <a href="logout.php" class="btn btn-primary ">Log Out</a>
        </div>
    </div>
</div>
<div class="container-fluid text-center" style="background-color:rgb(176, 192, 236);">
    <div class="">
        <h2 class="pt-3 pb-3"> Reports By Range</h2>
    </div>
</div>
<?php 
include("header.php")
?>
	
<h1> Reports found from  date <?php echo $start." to ".$end ?></h1>
<br>
<div class='table-responsive'>
<table class='table table-hover'>
	<thead>
	<tr>
		<th>No</th>
		<th>Report id</th>
		<th>appointment id</th>
		<th>client name</th>
		<th>doctor name</th>
		<th>Report type</th>
		<th>report request date</th>
		<th>report upload status</th>
		<th>report upload date</th>
		<th>Upload report</th>
		<th>fee</th>
		<th>Download Report</th>
		<th>Edit details</th>
	</tr>
	</thead>
	<?php
	
	$start=$_GET['start_date'];
	$end=$_GET['end_date'];
	include('db.php');
	
	
	
	$no=1;
	$lab_id = $_SESSION['labid'];
	include('db.php');
	$qry = "SELECT * FROM `reports` WHERE `lab_id`=$lab_id" ;
	$ans = mysqli_query($con,$qry);
	while($data = mysqli_fetch_assoc($ans))
	{
		
		if(($start <= $data['date_of_request']) && ( $end >= $data['date_of_request']))
		{
			
			?><tr><td><?php echo $no;$no++;?></td><?php
			?><td><?php echo $data['id'] ?></td><?php

			?><td><?php echo $data['appoinmentid'] ?></td><?php
			?><td><?php echo findclientname($data['clientid']); ?></td><?php
			?><td><?php echo finddoctorname($data['doctorid']); ?></td><?php
			?><td><?php echo $data['report_type'] ?></td><?php
			?><td><?php echo $data['date_of_request'] ?></td><?php
			?><td><?php echo $data['report_status'] ?></td><?php
			?><td><?php echo $data['report_upload_date'] ?></td><?php
			?><td><a href="upload_report.php?report_id=<?php echo $data['id']?>">upload</a></td><?php
			?><td><?php echo $fee = $data['fee'] ?></td><?php
			?><td><a href="reports/<?php echo $data['report']?>">Click to download</a></td><?php
			?><td><a href="edit_report_details.php?report_id=<?php echo $data['id']?>">edit</a></td><?php
			
			
		}
	}
	
	
?>

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
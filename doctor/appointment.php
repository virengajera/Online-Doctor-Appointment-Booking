<?php
//include auth_session.php file on all user panel pages
	include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="css/dashboard.css" rel="stylesheet">
    
</head>

<?php

include('db.php');
$doctorid = $_SESSION['docid'];

$query    = "SELECT * FROM `doctorlogin` WHERE doctorid=$doctorid;";
$result = mysqli_query($con, $query) or die(mysql_error());
if($result)
{
	$data = mysqli_fetch_assoc($result);
	$doctorname = $data['doctorname'];
}

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

function check_report($id)
{			
			
			include('db.php');
			$qry="SELECT * FROM `reports` where appoinmentid=$id";
			$ans = mysqli_query($con,$qry);
			$data = mysqli_fetch_assoc($ans);
			if($ans)
			{
				
				
				if($data['appoinmentid']==$id)
				{
				
					if($data['report'])
					{
						?>
						<a href="../laboratory/reports/<?php echo $data['report']?>">
						click to download
						</a><?php
	
					}
					else
					{
						echo "report not available";
						
					}
				}
				else
				{
					echo "not applied for report";
				}
			}
			else
			{
				echo "error";
			}

}

?>
<body>
<div class="container-fluid pt-2 pb-2" style="background-color:rgba(209, 209, 170,0.3);">
    <div class="row">
        <div class="col-sm-10 ">
         <a href="dashboard.php">  <img  width="150" class="ml-0 mt-2 mb-2" src="../images/logo.png"></a> 
        </div>
        <div class="col-sm-2">
		<h3 class="mr-0">Hey, <?php echo $doctorname ?>!</h3>
            <a href="logout.php" class="btn btn-primary ">Log Out</a>
        </div>
    </div>
</div>
<div class="container-fluid text-center" style="background-color:rgb(176, 192, 236);">
    <div class="">
        <h2 class="pt-3 pb-3">Doctor Appointments</h2>
    </div>
</div>

<?php include('header.php'); ?>
</div>


<!-- ------------------------------TODAY APPOINTMENTS --------------------------------------- -->
<h3 class='text-center'>TODAY APPOINTEMENTS</h3>
<div class='table-responsive'>
	<table class='table table-hover' >
	<thead>
	<tr >
		<th>No</th>
		<th>appointment id</th>
		<th>date</th>
		<th>client name</th>
		<th>Timeslot</th>
		<th>description</th>
		<th>status</th>
		<th>report need</th>
		<th>Edit details</th>
		<th>Download Report</th>
	</tr>
	</thead>
<?php
$doctorid=$_SESSION['docid'];
$no = 1;
$today = date("Y-m-d");
$qry1 =  "SELECT * FROM `appointment` WHERE `doctorid`='$doctorid'" ;
	$ans1 = mysqli_query($con,$qry1);
	
	while($data1 = mysqli_fetch_assoc($ans1))
	{
		if($today == $data1['date'])	
		{
			?><tr><td><?php echo $no;$no++;?></td><?php
			?><td><?php echo $data1['appointmentid'] ?></td><?php
			$appid=$data1['appointmentid']
			?><td><?php echo $data1['date'] ?></td><?php
			?><td><?php echo findclientname($data1['clientid']); ?></td><?php
			?><td><?php echo $data1['timeslot'] ?></td><?php
			?><td><?php echo $data1['description'] ?></td><?php
			?><td><?php echo $data1['status'] ?></td><?php
			?><td><?php echo $data1['report_need'] ?></td><?php
			?><td><a href="editdetails.php?id=<?php echo $data1['appointmentid']?>&&name=<?php echo findclientname($data1['clientid'])?>&&clientid=<?php echo $data1['clientid'];?>"> Edit </a><?php
			?><td><?php check_report($appid) ?></td><?php
			
		}
	}
  
?>
</table>
</div>

<!-- -----------------------END TODAY APPONITMENTS ------------------------------------------ -->

<hr>
<br>
<br>




<!-- ------------------------------FUTURE APPOINTMENTS --------------------------------------- -->

<h3 class='text-center'>Future  Appointments</h3>
<div class="table-responsive">
	<table class="table table-hover">
	<thead>
	<tr >
		<th>No</th>
		<th>appointment id</th>
		<th>date</th>
		<th>client name</th>
		<th>Timeslot</th>
		<th>description</th>
		<th>status</th>
		<th>report need</th>
		<th>Edit details</th>
		<th>Download Report</th>
	</tr>
	</thead>
<?php
$doctorid=$_SESSION['docid'];
$no = 1;
$today = date("Y-m-d");
$qry1 =  "SELECT * FROM `appointment` WHERE `doctorid`='$doctorid'" ;
	$ans1 = mysqli_query($con,$qry1);
	
	while($data1 = mysqli_fetch_assoc($ans1))
	{
		if($today < $data1['date'])	
		{
			?><tr><td><?php echo $no;$no++;?></td><?php
			?><td><?php echo $data1['appointmentid'] ?></td><?php
			$appid=$data1['appointmentid']
			?><td><?php echo $data1['date'] ?></td><?php
			?><td><?php echo findclientname($data1['clientid']); ?></td><?php
			?><td><?php echo $data1['timeslot'] ?></td><?php
			?><td><?php echo $data1['description'] ?></td><?php
			?><td><?php echo $data1['status'] ?></td><?php
			?><td><?php echo $data1['report_need'] ?></td><?php
			?><td><a href="editdetails.php?id=<?php echo $data1['appointmentid']?>&&name=<?php echo findclientname($data1['clientid'])?>&&clientid=<?php echo $data1['clientid'];?>"> Edit </a><?php
			?><td><?php check_report($appid) ?></td><?php
			
		}
	}
  
?>
</table>
</div>
<!-- ------------------------------END FUTURE APPOINTMENTS --------------------------------------- -->


<hr>
<br>
<br>

<!-- ------------------------------OLD APPOINTMENTS --------------------------------------- -->
<h3 class='text-center'>OLD APPOINTEMENTS</h3>
<div class="table-responsive">
	<table class="table table-hover" >
	<thead>
	<tr>
		<th>No</th>
		<th>appointment id</th>
		<th>date</th>
		<th>client name</th>
		<th>Timeslot</th>
		<th>description</th>
		<th>status</th>
		<th>report need</th>
		<th>Edit details</th>
		<th>Download Report</th>
	</tr>
	</thead>

<?php
$doctorid=$_SESSION['docid'];
$no = 1;
$today = date("Y-m-d");
$qry1 =  "SELECT * FROM `appointment` WHERE `doctorid`='$doctorid'" ;
	$ans1 = mysqli_query($con,$qry1);
	
	while($data1 = mysqli_fetch_assoc($ans1))
	{
		if($today > $data1['date'])	
		{
			?><tr><td><?php echo $no;$no++;?></td><?php
			?><td><?php echo $data1['appointmentid'] ?></td><?php
			$appid=$data1['appointmentid']
			?><td><?php echo $data1['date'] ?></td><?php
			?><td><?php echo findclientname($data1['clientid']); ?></td><?php
			?><td><?php echo $data1['timeslot'] ?></td><?php
			?><td><?php echo $data1['description'] ?></td><?php
			?><td><?php echo $data1['status'] ?></td><?php
			?><td><?php echo $data1['report_need'] ?></td><?php
			?><td><a href="editdetails.php?id=<?php echo $data1['appointmentid']?>&&name=<?php echo findclientname($data1['clientid'])?>&&clientid=<?php echo $data1['clientid'];?>"> Edit </a><?php
			?><td><?php check_report($appid) ?></td><?php
			
		}
	}
  
?>
</table>
</div>
<!-- -----------------------END OLD APPONITMENTS ------------------------------------------ -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                    crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
					crossorigin="anonymous"></script>

<br><br>
</body>
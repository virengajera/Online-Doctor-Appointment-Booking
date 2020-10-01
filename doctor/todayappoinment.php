<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
	
	<link href="css/dashboard.css" rel="stylesheet">
    
</head>

<body>
	

<?php
include('header.php');
?>
<h3 class='text-center'>TODAY APPOINTEMENTS</h3>

<?php
include('db.php');
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
				<!----displaying table===-->
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

</body>
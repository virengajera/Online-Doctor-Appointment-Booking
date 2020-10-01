<?php
//include auth_session.php file on all user panel pages
	include("auth_session.php");

	  $docid=$_SESSION['docid'];
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
<body>

<div class="container-fluid pt-2 pb-2" style="background-color:rgba(209, 209, 170,0.3);">
    <div class="row">
        <div class="col-sm-10 ">
            <img  width="150" class="ml-0 mt-2 mb-2" src="../images/logo.png">
        </div>
        <div class="col-sm-2">
            <h3 class="mr-0">Hey, <?php echo finddoctorname($docid); ?>!</h3>
            <a href="logout.php" class="btn btn-primary ">Log Out</a>
        </div>
    </div>
</div>
<div class="container-fluid text-center" style="background-color:rgb(176, 192, 236);">
    <div class="">
        <h2 class="pt-3 pb-3">Doctor Dashoard</h2>
    </div>
</div>

<?php
	include('header.php');
/*
include('db.php');
$doctorid = $_SESSION['id'];

$query    = "SELECT * FROM `doctorlogin` WHERE doctorid=$doctorid;";
$result = mysqli_query($con, $query);
if($result)
{
	$data = mysqli_fetch_assoc($result);
	$doctorname = $data['doctorname'];
	if($data['profile'])
	{
		$image=$data['profile'];
	}
	else
	{
		$image="default.jpg";
	}
}*/
?>
		
		
			<h1>Date : <?php echo date("d-m-Y"); ?></h1>
			<h1>Time : <?php date_default_timezone_set('Asia/Kolkata');
		$currentTime = date( 'h:i:s A', time () );
		echo $currentTime;
	?></h1>
	
		
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
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                    crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
					crossorigin="anonymous"></script>
					

</body>
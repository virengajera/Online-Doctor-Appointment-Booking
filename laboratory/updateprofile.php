<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link href="css/dashboard.css" rel="stylesheet">
	</head>
<body>


<?php
include('db.php');
include("auth_session.php");



	$id = $_SESSION['labid'];
	$query = " SELECT * FROM laboratory WHERE id=$id";
	$exe = mysqli_query($con,$query);
	if($exe)
	{   
		$data = mysqli_fetch_assoc($exe);
		
		 $labname = $data['labname'];
		 $username = $data['username'];
		 $phoneno=$data['phoneno'];
		 $email=$data['email'];
		 $labtype=$data['labtype'];
		 $speciality = $data['speciality'];
		
	}
	else
	{
		echo "error in fetching name";
		
	}
?>

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
        <h2 class="pt-3 pb-3">Laboratory Update Profile</h2>
    </div>
</div>

<?php 
include("header.php");
?>
	
<div class="container-fluid">
<form action="update.php" method="POST" enctype="multipart/form-data" class="my-5 w-50 mx-auto myform"> 
<div class="form-group" >
    <label>Enter Laboratory Name</label>
    <input type="text" class="form-control" name="labname" require value=<?php echo $labname?>>
</div>

<div class="form-group" >
    <label>Enter User Name</label>
    <input type="text" class="form-control" name="username" require value=<?php echo $username?>>
</div>

<div class="form-group" >
    <label>Enter Phone number</label>
    <input type="text" class="form-control" name="phoneno" require value=<?php echo $phoneno?>>
</div>

<div class="form-group" >
    <label>Enter E-mail</label>
    <input type="email" class="form-control" name="email" require value=<?php echo $email?>>
</div>


<div class="form-group" >
    <label>Enter Lab Type</label>
    <input type="text" class="form-control" name="labtype" require value=<?php echo $labtype ?>>
</div>
<div class="form-group" >
    <label>Enter Speciality</label>
    <input type="text" class="form-control" name="speciality" require value=<?php echo $speciality?>>
</div>

<button type="submit" class="btn btn-primary"value="submit" name="submit">Submit</button>

</form>

</div>

</body>
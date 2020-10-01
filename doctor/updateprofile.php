<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	</head>
<body>
<?php
include('db.php');
include("auth_session.php");
$id=$_SESSION['docid'];
$sql = "SELECT * FROM `doctorlogin` WHERE `doctorid`= $id;";
$execute1 = mysqli_query($con,$sql);
		if($execute1)
		{
			$data = mysqli_fetch_assoc($execute1);
			$doctorname=$data['doctorname'];
			$phoneno=$data['phoneno'];
			$speciality=$data['speciality'];
			$degre=$data['degree'];
			$experience=$data['experience'];
			$age=$data['age'];
			$fee=$data['fee'];
		}
		else
		{
			
			echo "error in getting details from database";
		}
//session and database string	
?>

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
        <h2 class="pt-3 pb-3">Doctor update Profile</h2>
    </div>
</div>

<?php include("header.php"); 
?>
<div class="container-fluid">
<form action="update.php" method="POST" enctype="multipart/form-data" class="my-5 w-50 mx-auto myform"> 
<div class="form-group" >
    <label>Enter Doctor Name</label>
    <input type="text" class="form-control" name="name" required require value = <?php echo $doctorname?>>
  </div>

  <div class="form-group" >
    <label>Enter Phone no</label>
    <input type="text" class="form-control" required name="phone_no" value = <?php echo $phoneno?>>
  </div>

  <div class="form-group" >
    <label>Enter Speciality</label>
    <input type="text" class="form-control" required name="special" value = <?php echo $speciality?>>
  </div>

  <div class="form-group" >
    <label>Enter Degree</label>
    <input type="text" class="form-control" required name="degree" value = <?php echo $degre?>>
  </div>
  <div class="form-group" >
    <label>Enter Degree</label>
    <input type="text" class="form-control" required name="degree" value = <?php echo $degre?>>
  </div>
  <div class="form-group" >
    <label>Enter Experience</label>
    <input type="text" class="form-control" required name="exp" value = <?php echo $experience?>>
  </div>
  <div class="form-group" >
    <label>Enter age</label>
    <input type="text" class="form-control" required name="age" value = <?php echo $age?>>
  </div>

  <div class="form-group" >
    <label>Enter Fee</label>
    <input type="text" class="form-control" required name="fee" value=<?php echo $fee ?>>
  </div>

  <div class="form-group" >
    <label>Update Profile Picture</label>
    <input type="file"  required name="simg" placeholder="Upload Profile image">
</div>

<button type="submit" class="btn btn-primary"value="submit" name="submit">Submit</button>
</form> 
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                    crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
					crossorigin="anonymous"></script>
</div>
</body>

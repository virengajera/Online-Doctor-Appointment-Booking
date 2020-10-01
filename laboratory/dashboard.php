<?php
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lab Homepage</title>
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
        <h2 class="pt-3 pb-3">Laboratory Dashboard</h2>
    </div>
</div>
	
<?php
include("header.php");
?>

</body>
</html>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Lab Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
<?php
	require('db.php');
	session_start();
	if(isset($_SESSION['labid']))
	{
		header("location:dashboard.php");
	}
	
		if (isset($_POST['submit'])) 
		{
			
			$username = stripslashes($_POST['username']);    // removes backslashes
			$password= stripslashes($_POST['password']); 
			
			
			$query = "SELECT * FROM `laboratory` WHERE `username`= '$username' AND `password`='$password';";
			$result = mysqli_query($con, $query) or die(mysql_error());
			$rows = mysqli_num_rows($result);
			if($rows == 1)
			{
				
				$data = mysqli_fetch_assoc($result);
				echo $_SESSION['labid']=$data['id'];
				header("location:dashboard.php");
			}
			else
			{
				echo "<div class='form text-center'>
						<h3>Incorrect Username/password.</h3><br/>
						<p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
					  </div>";
				
			}
		}
	else{

?>


<div class="container h-100" >
<h1 class="text-center">Laboratory Login</h1>
<hr>
<form class="w-50 m-auto my-auto" method="post" name="login">
  <div class="form-group" >
    <label>Lab UserName(Not actual Name)</label>
	<input type = "text"  class="form-control" name="username" placeholder="Username" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Lab Password</label>
	<input type = "password" class="form-control" name="password" placeholder="Password" required>
  </div>

  <button type="submit" class="btn btn-primary" value="Login" name="submit">Login</button>
  <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
</form>

</div>

<div class="row  text-center my-5">
    <div class="col"> 
    <a href="../index.html" class="btn btn-primary">Go Back Home</a>
    </div>
</div>

	<?php } ?>


	?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
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



</html>
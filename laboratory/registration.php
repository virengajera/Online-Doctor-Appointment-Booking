<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<?php
	include("db.php");
	if(isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$em=$_POST['email'];
		$password = $_POST['password'];
		$query = "INSERT INTO `laboratory`(`username` , `password`,`email`) VALUES ('$username','$password','$em');";
		$run = mysqli_query($con,$query);
		if($run)
		{
			echo "<div class='conatiner'>
				<h3 class='text-center'>You are registered successfully.</h3><br>
				<p class='link text-center'>Click here to <a href='login.php'>Login</a></p>
				</div>";
		}
		else
		{
				
		}
	}
	else
	{
?>


<h1 class="text-center">Laboratory Registration</h1>
<hr>
<form class="w-50 m-auto my-auto" method="post" action="registration.php">
  <div class="form-group" >
    <label>Lab name</label>
    <input type = "text" class="form-control" name="username" placeholder="Username" required>
  </div>

  <div class="form-group" >
    <label>Lab E-mail</label>
    <input type="text" class="form-control" name="email" placeholder="email" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Lab Password</label>
    <input type = "password" class="form-control" name="password" placeholder="Password" required>
  </div>

  <button type="submit" class="btn btn-primary mt-3" value="Register" name="submit">Register</button>
  <p class="mt-4">Already have an account? <a href="login.php">Login here</a></p>




<?php }
 ?>

<div class="row  text-center my-5">
    <div class="col"> 
    <a href="../index.html" class="btn btn-primary">Go Back Home</a>
    </div>
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
</body>
</html>
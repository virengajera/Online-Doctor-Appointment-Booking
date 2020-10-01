<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $email    = stripslashes($_REQUEST['email']);
        $password = stripslashes($_REQUEST['password']);
		$query    = "INSERT INTO `doctorlogin` (`doctorid`, `clinicid`, `doctorname`, `doctorpassword`, `doctoremail`, `phoneno`, `speciality`, `rating`, `degree`, `experience`, `age`, `fee`, `profile`) VALUES (NULL, NULL,'$username', '$password', '$email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');";
					 
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link text-center'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3 class='text-center'>Required fields are missing.</h3><br/>
                  <p class='link text-center'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
<h1 class="text-center">Doctor Registration</h1>
<hr>
<form class="w-50 m-auto my-auto" method="post" action="">
  <div class="form-group" >
    <label>Doctor name</label>
    <input type="text" class="form-control" name="username" placeholder="Username" required>
  </div>

  <div class="form-group" >
    <label>Doctor E-mail</label>
    <input type="text" class="form-control" name="email" placeholder="email" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
  </div>

  <button type="submit" class="btn btn-primary mt-3" value="Register" name="submit">Register</button>
  <p class="mt-4">Already have an account? <a href="login.php">Login here</a></p>

    <div class="row  text-center my-5">
    <div class="col"> 
    <a href="../index.html" class="btn btn-primary">Go Back Home</a>
    </div>
</div>
<?php
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
</html>

<?php
include('header.php');
include('auth_session.php');
$_SESSION['report_id']=$_GET['report_id'];
?>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="css/report.css" rel="stylesheet">
	</head>
</body>
	
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Lab area</title>
	<link href="css/dashboard.css" rel="stylesheet">
    
</head>
	
<div class="heading5">
	<p> Upload report</p>
</div>

<form action="upload_file.php" method="post" enctype="multipart/form-data">
<h1>Upload report file</h1>
<input type="file" name="rimg" required><br><br>
<input type="submit" name="submit" value="click to upload" >
</form> 
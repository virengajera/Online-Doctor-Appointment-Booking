<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
	<link href="css/dashboard.css" rel="stylesheet">
    
</head>
<?php

include('header.php');

?>
<!--  --------------------------------------------showing date and time-=================--------------------       -->
<section class="appoinment-time">
		<div class="item">
			<h1>Date : <?php echo date("d-m-Y"); ?><h1>
		</div>
		<div>
			<h2>Report requirements changes</h2>
		</div>
		<div class="item">
			<h1>Time : <?php date_default_timezone_set('Asia/Kolkata');
		$currentTime = date( 'h:i:s A', time () );
		echo $currentTime;
	?><h1>
		</div>
</section>
<?php


echo $_GET['id'];
?>
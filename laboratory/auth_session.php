<?php
session_start();
if(!isset($_SESSION['labid']))
{
	header("location:login.php");
	exit();
}
?>
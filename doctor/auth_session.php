<?php
    session_start();
    if(!isset($_SESSION['docid'])) {
        header("Location: login.php");
        exit();
    }
?>

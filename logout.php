<?php 
session_start();

        if($_SESSION['user'] == "")
                header('Location: index.php');

session_destroy();//kills the session

header('Location: index.php');//sends them to index.php
	
?>

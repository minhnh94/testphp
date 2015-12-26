<?php


    include_once ('__autoload.php');
    $userid = $_GET['user_id'];
    
    $user = new user();
    header('location:admin-board.php');
	
?>

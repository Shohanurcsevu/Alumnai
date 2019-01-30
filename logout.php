<?php
	include_once('classes/User.php');
	$user = new User();

	if($_GET['action'] && $_GET['action']=='logout'){
	    $user->logout();
	}else{
		header('location: index.php');
	}

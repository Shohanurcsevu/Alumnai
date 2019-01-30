<?php
	include_once('classes/Message.php');
	$message = new Message();

	if($_SERVER['REQUEST_METHOD']== "POST"){
	    $data = $message->chat_person_list();
	    echo $data;

	}else{
	    return "Ajax Request Error";
	}

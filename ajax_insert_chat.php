<?php
	include_once('classes/Message.php');
	$message = new Message();

	if($_SERVER['REQUEST_METHOD']== "POST"){
		$message_to_user_id = $_POST['message_to_user_id'];
		$message_from_user_id = $_POST['message_from_user_id'];
		$chat_message = $_POST['chat_message'];

	    $data = $message->insert_chat($message_to_user_id , $message_from_user_id, $chat_message);
	    echo $data;

	}else{
	    return "Ajax Request Error";
	}
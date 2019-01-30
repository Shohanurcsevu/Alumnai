<?php
include_once('classes/User.php');
$user = new User();

if($_SERVER['REQUEST_METHOD']== "POST"){
    $data = $user->update_user_activity($_POST['user_id']);
    echo $data;
}else{
    return "Ajax Request Error";
}

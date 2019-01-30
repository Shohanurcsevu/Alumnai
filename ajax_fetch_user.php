<?php
include_once('classes/User.php');
$user = new User();

if($_SERVER['REQUEST_METHOD']== "POST"){
    $data = $user->ajax_fetch_user();
    echo $data;

}else{
    return "Ajax Request Error";
}

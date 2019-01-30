<?php
    ob_start();
    session_start();
    $con =  mysql_connect("localhost","root","");
    $db = mysql_select_db('alumnai',$con);
    if(!$db){
        echo '<h1>:) DataBase are not Connected.</h1>'.mysqli_errno();
    }
?>





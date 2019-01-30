<?php
    include_once('../classes/User.php');
    $user = new User();
    include_once('../classes/Department.php');
    $department = new Department();
    include_once('../classes/Blog.php');
    $blog = new Blog();

    if(!$user->is_admin()){
        header("location: ../login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Admin || Panel </title>
    <link rel="icon" type="image/png" sizes="32x32" href="img/logo-2.png">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--Fonst-Awesome CSS-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!--Animate CSS-->
    <link rel="stylesheet" href="css/animate.css">

    <!-- tinyMCE editor -->
    <script src="tinymce/jquery.tinymce.min.js"></script>
    <script src="tinymce/tinymce.min.js"></script>
    <!--Style CSS-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header-top-area">
    <div class="header-top">
        <a href="index.php" class=" pull-left font-size"><i class="fa fa-bars"></i>dashboard</a>
        <a href="../logout.php?action=logout" class="pull-right"><i class="fa fa-unlock"></i>log out</a>
    </div>
</div>
<div class="clear"></div>
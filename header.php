<?php
    error_reporting(0);
    include_once('classes/User.php');
    $user = new User();
    include_once('classes/Department.php');
    $department = new Department();
    include_once('classes/Blog.php');
    $blog = new Blog();
    include_once('classes/Message.php');
    $message = new Message();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Alumnai System ||HTML-5 PROJECT</title>
        <link rel="icon" type="image/png" sizes="32x32" href="img/logo.png">
        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!--Owl-Carousel CSS-->
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <!--Owl-Carousel-theme CSS-->
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <!--Fonst-Awesome CSS-->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!--Animate CSS-->
        <link rel="stylesheet" href="css/animate.css">
        <!--Pretty photo CSS-->
        <link rel="stylesheet" href="css/prettyPhoto.css">
        <!-- jquery ui for modal dialog -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!--Style CSS-->
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!--Header area start-->
        <header class="v-header-area-start">
            <div class="container">
                <div class="row">
                    <div class="v-header-area">
                        <div class="col-md-6">
                            <div class="v-header-left pull-left">
                                <span><i class="fa fa-envelope-o"> </i> Example@mail.com</span>
                                <span> / </span>
                                <span><i class="fa fa-phone"> </i> (+008) 012 345 67</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="v-header-right pull-right">
                                <!-- admin dashboard link visibility --> 
                                <?php
                                    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=="admin") {
                                ?>  
                                    <a href="admin/index.php">Dashboard</a>
                                <?php
                                    }
                                ?>
                                <!-- login logout link visibility -->                            
                                <?php
                                    if(isset($_SESSION['user_type']) && !empty($_SESSION['user_type'])) {
                                ?>  
                                    <a href="logout.php?action=logout">logout</a>
                                <?php
                                    }else{
                                ?>
                                    <a href="login.php">login</a>
                                    <a href="signup.php">sign up</a>
                                <?php        
                                    }
                                ?>
                                <span> / </span>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--Header area end-->

        <!--nav Area start-->
        <nav class="v-nav-area-start">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="v-logo-area">
                            <a href="index.php" class="v-logo">alumnai   <img src="img/logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <!-- menu include -->
                    <?php include_once('menu.php');?>
                </div>
            </div>
        </nav>
        <!--nav Area end-->
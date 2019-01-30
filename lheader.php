<?php include_once('header.php');?>

<section class="v-profile-area-start">
    <div class="v-profile-area">
        <a href=""><?php echo $_SESSION['name'];?></a>
        <ul class="profile-menu">
            <?php
                if(isset($_SESSION['name']) && isset($_SESSION['user_id'])){
                    echo '<li><a href="profile.php?user_id='. $_SESSION['user_id'].'"><i class="fa fa-user"></i> profile</a></li>
                        <li><a href="about.php?user_id='.$_SESSION['user_id'].' "><i class="fa fa-globe"></i> about</a></li>';
                }
            ?>
            <?php
            if(!isset($_SESSION['name']) && !isset($_SESSION['user_id'])){
                echo '<li><a href="editprofile.php?user_id='.$_SESSION['user_id'].'" style="display:none"><i class="fa fa-rss"></i> edit</a></li>';
            }
            else{
                echo '<li><a href="editprofile.php?user_id='.$_SESSION['user_id'].'" style="display:block"><i class="fa fa-rss"></i> edit</a></li>';
            }
            ?>
            <li><a href="members.php"><i class="fa fa-users"></i> All Members</a></li>
        </ul>
    </div>
<?php
    include('lheader.php');

    //get user_id from get method
    if($_SERVER['REQUEST_METHOD']== "GET" AND isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $user = $user->get_user($user_id);
    }else{
        header('location: members.php');
    }


?>
    <div class="v-profile-bio">
        <div class="v-pro-img">
            <img src="img/1.png" alt="profile">
        </div>
        <div class="v-pro-details">
           <h1>Hello,</h1>
            <h1>I am <?php echo $user['name'];?></h1>
            <h1 class="color"><?php echo $user['work_title'];?></h1>
            <p><?php echo $user['work_description'];?></p>
            <a href="send_message.php?user_id=<?php echo $user['user_id'];?>" class="default-btn">contact me</a>
        </div>
    </div>
    <div class="clear"></div>
</section>



<?php include('footer.php');?>
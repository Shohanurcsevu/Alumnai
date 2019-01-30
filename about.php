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
            <h1>About me</h1>
            <p><?php echo $user['work_description'];?></p>
            <ul class="pro-boi-data">
                <li><strong>Name : </strong><?php echo $user['name'];?></li>
                <li><strong>Date of birth  : </strong><?php echo $user['birth_date'];?></li>
                <li><strong>Phone  : </strong><?php echo $user['work_description'];?></li>
                <li><strong>Nationality  : </strong> <?php echo $user['work_description'];?></li>
                <li><strong>Marital Status : </strong> <?php echo $user['work_description'];?></li>
                <li><strong>Email  : </strong><?php echo $user['email'];?></li>
                <li><strong>Address  : </strong><?php echo $user['work_description'];?></li>
                <li><strong>Work Status  : </strong><?php echo $user['work_description'];?></li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
</section>
<?php include('footer.php');?>
<?php 
    include('header.php');

    //signup form post request -- add user
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $user->login($_POST);
    }
?>
<!--Login2 area start-->
<section class="login2-area">
    <div class="container">
        <div class="row no-max">
            <div class="col-md-5">
                <div class="login2-bg">
                    <div class="login2-bg-img">
                        <img src="img/login.png" alt="login">
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="login2-form-text">
                    <div class="login2-middle">
                        <div class="logn2-text">
                            <h2>log in with your account</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <?php
                                if (isset($_GET['message'])) {
                                    echo "<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button>" . $_GET['message'] . "</div>";
                                    unset($_GET['message']);
                                }
                            ?>
                        </div>
                        <div class="login2-form">
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                                <input type="email" name="email"  id="email" placeholder='Email*'>
                                <input type="password" name="password"  id="password" placeholder='********'>
                                <button type="submit" class="login1-btn">log in</button>
                            </form>
                            <br>
                            <span><i class="fa fa-check-circle"></i>  create an account <a href="signup.php">click here</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Login2 area end-->
<?php include('footer.php');?>
<?php 
    include('header.php');


    //signup form post request -- add user
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $user->register($_POST);
    }
?>
<!--Signup area start-->
<section class="sing1-area">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="sing1-form-bg">
                    <div class="sign1-img">
                        <img src="img/login.png" alt="signup">
                    </div>
                </div>
            </div> <!--Form img end-->
            <div class="col-md-7">
                <div class="sign1-form">
                    <div class="sign1-middle">
                        <div class="sign1-text">
                            <h2>create an account</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <?php
                                if (isset($_GET['message'])) {
                                    echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>" . $_GET['message'] . "</div>";
                                    unset($_GET['message']);
                                }
                            ?>
                        </div>
                        <div class="sign1-form-text">
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                                <input type="text" name="name" id="name" placeholder="Student Name *" autocomplete="off" >
                                <select name="department_name" id="department_name">
                                    <option value="" disabled="disabled" selected="selected">Select Department</option>
                                    <?php
                                        $all_departments = $department->all_department();
                                        if($all_departments) {
                                            foreach ($all_departments as $single_department) {
                                                ?>
                                                <option value="<?php echo $single_department['department_id'];?>"><?php echo $single_department['department_name'];?></option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                                <input type="number" name="roll" id="roll" placeholder="Student Roll *" autocomplete="off" ]>
                                <input type="text" name="session" id="session" placeholder="session: 2015-2019 *" autocomplete="off" >
                                <input type="number" name="passing_year" id="pyar" placeholder="Passing Year *" autocomplete="off" >
                                <input type="email" name="email" id="email" placeholder="Email *" autocomplete="off" >
                                <input type="password" name="password" id="password" placeholder="Password *" autocomplete="off" >
                                <input type="checkbox" name="remember" id="remember"> <span><label for="remember">I have read and accept </label><a href="#"> terms and conditions</a></span>
                                <button type="submit" class="login1-btn">sign up</button>
                            </form>
                            <span><i class="fa fa-check-circle"></i> Have an account <a href="login.php">click here</a></span>
                        </div>
                    </div>
                </div>
            </div> <!--Sign up from start-->
        </div>
    </div>
</section>
<!--Signup area end-->
<?php include('footer.php');?>
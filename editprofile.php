<?php 
    include('lheader.php');

    //get user_id from get method
    if($_SERVER['REQUEST_METHOD']== "GET" AND isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $user = $user->get_user($user_id);
    }
    //Edit user by id
    if($_SERVER['REQUEST_METHOD']== "POST"){
      $user->update_frontend_profile($_POST);
    }
?>

    <div class="v-profile-bio">
        <div class="v-pro-img">
            <img src="img/1.png" alt="profile">
        </div>
        <div class="v-pro-details">
            <h1>Edit Profile</h1>
            <?php
                if (isset($_GET['message'])) {
                    echo "<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button>" . $_GET['message'] . "</div>";
                    unset($_GET['message']);
                }
            ?>
            <div class="edit-form">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                   <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
                    <label for="image"> <img src="img/profile/profileimage.png" alt="">
                        <input type="file" name="image" id="image" class="file-pic">
                    </label>

                    <div class="form-group">
                      <label for="name">Member Name</label>
                      <input id="name" name="name" class="form-control"  type="text" value="<?php echo $user['name'];?>" required>

                      <input id="user_id" name="user_id" class="textInput" style="width:100%;" type="hidden" value="<?php echo $user['user_id'];?>">
                    </div>

                    <div class="form-group">
                      <label for="department_name">Member Department</label>
                      <select name="department_name" id="department_name" class="form-control" required>
                          <option disabled>Select Department</option>
                          <?php
                          $all_departments = $department->all_department();
                          if($all_departments) {
                              foreach ($all_departments as $single_department) {
                                  ?>
                                  <option value="<?php echo $single_department['department_name'];?>" <?php echo ($single_department['department_name']==$user['department_name'])?"selected":""; ?>><?php echo $single_department['department_name'];?></option>
                                  <?php
                              }
                          }
                          ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="roll">Member Roll</label>
                      <input id="roll" name="roll" class="form-control" type="number" value="<?php echo $user['roll'];?>" required>
                    </div>

                    <div class="form-group">
                      <label for="session">Member Session</label>
                      <input id="session" name="session" class="form-control" type="text" value="<?php echo $user['session'];?>" required>
                    </div>

                    <div class="form-group">
                      <label for="passing_year">Member Passing Year</label>
                      <input id="passing_year" name="passing_year" class="form-control" type="number" value="<?php echo $user['passing_year'];?>" required>
                    </div>

                    <div class="form-group">
                      <label for="email">Member Email</label>
                      <input id="email" name="email" class="form-control" type="email" value="<?php echo $user['email'];?>" required>
                    </div>

                    <div class="form-group">
                      <label for="birth_date">Birth Date</label>
                      <input id="birth_date" name="birth_date" class="form-control" type="date" value="<?php echo $user['birth_date'];?>" required>
                    </div>

                    <div class="form-group">
                      <label for="mobile_no">Member Mobile No.</label>
                      <input id="mobile_no" name="mobile_no" class="form-control" type="number" value="<?php echo $user['mobile_no'];?>" required>
                    </div>

                    <div class="form-group">
                      <label for="nationality">Nationality</label>
                      <input id="nationality" name="nationality" class="form-control" type="text" value="<?php echo $user['nationality'];?>" required>
                    </div>

                    <div class="form-group">
                      <label for="marital_status">Marital Status</label>
                      <select name="marital_status" id="marital_status" class="form-control" required>
                          <option value="" disabled="">Select Marital Status</option>
                          <option value="single">Single</option>
                          <option value="married">Married</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="address">Address</label>
                      <input id="address" name="address" class="form-control" type="text" value="<?php echo $user['address'];?>" required>
                    </div>

                    <div class="form-group">
                      <label for="work_title">Work Title</label>
                      <input id="work_title" name="work_title" class="form-control" type="text" value="<?php echo $user['work_title'];?>" required>
                    </div>

                    <div class="form-group">
                      <label for="work_description">Work Description</label>
                      <input id="work_description" name="work_description" class="form-control" type="text" value="<?php echo $user['work_description'];?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <br><br>
                </form>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</section>
<?php include('footer.php');?>
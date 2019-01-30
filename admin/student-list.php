<?php
  include('header.php');
  //delete user by id
  if(isset($_GET['delete'])){
      $user_id = (int) $_GET['delete'];
      $user->delete_user($user_id);
  }

  //Edit user by id
  if($_SERVER['REQUEST_METHOD']== "POST" && isset($_POST['update'])){
      $user->update_user($_POST);
  }
?>
<div class="m-theme-area">
    <?php include('menu.php');?>   
    <!--Main menu area end-->
    <div class="m-main-area-start">
        <div class="m-title-area">
            <h4> <i class="fa fa-list-ul"></i>Students List</h4>
        </div>
        <!--Title area end-->
        <div class="m-main-part">
            <?php
                if (isset($_GET['message'])) {
                    echo "<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button>" . $_GET['message'] . "</div>";
                    unset($_GET['message']);
                }
            ?>
           <div class="test-search">
               <form action="">
                   <input type="text" name="test-search" id="test-search" placeholder="Here student ID" class="form-control">
               </form>
           </div>
           <!--Search area end-->
            <div class="daily-table">
                <table class="table table-responsive  table-striped table-hover">
                    <thead>
                        <tr class="success">
                            <th>#</th>
                            <th>EMAIL</th>
                            <th>STUDENT ID</th>
                            <th>STUDENT NAME</th>
                            <th>SESSION</th>
                            <th>PASSING YEAR</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        $users = $user->all_users();
                        $i = 1;
                        foreach ($users as $user) {
                      ?>
                        <tr>
                           <td><?php echo $i;?></td>
                            <td><?php echo $user['email'];?></td>
                            <td><?php echo $user['roll'];?></td>
                            <td><?php echo $user['name'];?></td>
                            <td><?php echo $user['session'];?></td>
                            <td><?php echo $user['passing_year'];?></td>
                            <td>
                                <a href="#edit<?php echo $user['user_id'];?>" class="btn-xs btn-primary" data-toggle="modal" data-target="#edit<?php echo $user['user_id'];?>"><i class="fa fa-pencil-square-o"></i> edit</a>
                                <!-- edit user modal -->
                                <div class="modal fade" id="edit<?php echo $user['user_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h3 class="modal-title" id="exampleModalLabel">Edit Student</h3>
                                            </div>
                                            <div class="modal-body">
                                                <form class="container-fluid text-left" id="editStudent" method="POST"
                                                      action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                  <!--Student Edit form-->
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label for="name">Student Name</label>
                                                          <input id="name" name="name" class="form-control"  type="text" value="<?php echo $user['name'];?>" required>

                                                          <input id="user_id" name="user_id" class="textInput" style="width:100%;" type="hidden" value="<?php echo $user['user_id'];?>">
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="roll">Student Roll</label>
                                                          <input id="roll" name="roll" class="form-control" type="number" value="<?php echo $user['roll'];?>" required>
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="department_name">Student Department</label>
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
                                                          <label for="session">Student Session</label>
                                                          <input id="session" name="session" class="form-control" type="text" value="<?php echo $user['session'];?>" required>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label for="passing_year">Student Passing Year</label>
                                                          <input id="passing_year" name="passing_year" class="form-control" type="number" value="<?php echo $user['passing_year'];?>" required>
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="email">Student Email</label>
                                                          <input id="email" name="email" class="form-control" type="email" value="<?php echo $user['email'];?>" required>
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="user_type">User Type</label>
                                                          <select name="user_type" id="user_type" class="form-control" required>
                                                              <option disabled>Select User Type</option>
                                                              <option value="admin" <?php echo ($user['user_type']=="admin")?"selected":""; ?>>Admin</option>
                                                              <option value="student" <?php echo ($user['user_type']=="student")?"selected":""; ?>>Student</option>
                                                          </select>
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="verify_status">Student Verification</label>
                                                          <select name="verify_status" id="verify_status" class="form-control" required>
                                                              <option value="0" <?php echo ($user['verify_status']=="0")?"selected":""; ?>>Not Verified</option>
                                                              <option value="1" <?php echo ($user['verify_status']=="1")?"selected":""; ?>>Verified</option>
                                                          </select>
                                                      </div>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input class="btn btn-primary" type="submit" value="Update" name="update">
                                                </form><!--Student Edit form end-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./Modal -->


                                <a href="student-list.php?delete=<?php echo $user['user_id'];?>" class="btn-xs btn-danger" onClick="return confirm('Are you sure to DELETE??');"><i class="fa fa-trash"></i> delete</a>
                                <?php
                                  //verify user badge
                                  if($user['verify_status']==0){
                                    echo '<span class="badge" style="background: #792e2e;">&times;</span>';
                                  }else{
                                    echo '<span class="badge" style="background: #2ea012;">&#10003;</span>';
                                  }
                                  //admin or student badge
                                  if($user['user_type']=="student"){
                                    echo '<span class="badge fa fa-graduation-cap"><i></i></span>';
                                  }else{
                                    echo '<span class="badge fa fa-user"><i></i></span>';
                                  }
                                ?>
                            </td>
                        </tr>
                      <?php
                          $i++;
                        }
                      ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Main  area end-->
</div>
<?php
    include('footer.php');
?>
<!--=================================================
  **
  ** Includes Template Parts
  ** Footer.php
===================================================-->

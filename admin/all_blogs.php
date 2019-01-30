<?php
  include('header.php');
  //delete user by id
  if(isset($_GET['delete'])){
      $blog_id = (int) $_GET['delete'];
      $blog->delete_blog($blog_id);
  }

  //Edit user by id
  if($_SERVER['REQUEST_METHOD']== "POST" && isset($_POST['update'])){
      $blog->update_blog($_POST);
  }
?>
<script>
    tinymce.init({
        selector: '.content'
    });
</script>
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
                   <input type="text" name="test-search" id="test-search" placeholder="Search Blog" class="form-control">
               </form>
           </div>
           <!--Search area end-->
            <div class="daily-table">
                <table class="table table-responsive  table-striped table-hover">
                    <thead>
                        <tr class="success">
                            <th>#</th>
                            <th>Title</th>
                            <th>SubTitle</th>
                            <th>Author</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        $blogs = $blog->all_blogs();
                        $i = 1;
                        foreach ($blogs as $blog) {
                      ?>
                        <tr>
                           <td><?php echo $i;?></td>
                            <td><?php echo $blog['title'];?></td>
                            <td><?php echo $blog['subtitle'];?></td>
                            <td><?php echo $user->get_name_by_id($blog['user_id']);?></td>
                            <td>
                                <a href="#edit<?php echo $blog['user_id'];?>" class="btn-xs btn-primary" data-toggle="modal" data-target="#edit<?php echo $blog['blog_id'];?>"><i class="fa fa-pencil-square-o"></i> edit</a>
                                <!-- edit user modal -->
                                <div class="modal fade custom_modal" id="edit<?php echo $blog['blog_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h3 class="modal-title" id="exampleModalLabel">Edit Blog</h3>
                                            </div>
                                            <div class="modal-body">
                                                <form class="container-fluid text-left" id="editBlog" method="POST"
                                                      action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                  <!--Student Edit form-->
                                                  <div class="row">
                                                  <div class="form-group">
		                                              <label for="title">Post Title</label>
		                                              <input id="title" name="title" class="form-control"  type="text" value="<?php echo $blog['title'];?>" required>

		                                              <input id="blog_id" name="blog_id" class="form-control"  type="hidden" value="<?php echo $blog['blog_id'];?>" required>
		                                            </div>

		                                            <div class="form-group">
		                                              <label for="subtitle">Post Subtitle</label>
		                                              <input id="subtitle" name="subtitle" class="form-control"  type="text" value="<?php echo $blog['subtitle'];?>" required>
		                                            </div>

		                                            <div class="form-group">
		                                              <label for="title">Post Content</label>
		                                              <textarea name="content" class="content" class="form-control" cols="68" rows="10" placeholder="Post Content* "><?php echo $blog['content'];?></textarea>
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


                                <a href="all_blogs.php?delete=<?php echo $blog['blog_id'];?>" class="btn-xs btn-danger" onClick="return confirm('Are you sure to DELETE??');"><i class="fa fa-trash"></i> delete</a>
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

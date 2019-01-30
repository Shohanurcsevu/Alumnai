<?php 
    include('header.php');

    //Edit user by id
    if($_SERVER['REQUEST_METHOD']== "POST"){
      $blog->add_blog($_POST);
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
            <h4> <i class="fa fa-tachometer"></i> Dashboard</h4>
        </div>
        <!--Title area end-->
        <?php
            if (isset($_GET['message'])) {
                echo "<div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'>&times;</button>" . $_GET['message'] . "</div>";
                unset($_GET['message']);
            }
        ?>
        <div class="m-main-part">
            <div class="single-part-area">
            <!--
                <div class="single-part">
                    <div class="single">
                        <a href="#"><i class="fa fa-wheelchair"></i></a>
                        <p>New Invoice</p>
                        <a href="student-list.php">All of the students</a>
                    </div>
                </div>
            -->
                <!--Single part end-->
                <div class="single-part">
                    <div class="single">
                        <a href="" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus red" ></i></a>
                        <p>Add Post</p>
                        <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">Add Test</a>
                        <!--=================================================
                          **
                          ** Modal Call
                          ** Modal Call for Add Test
                        ===================================================-->

                        <div class="modal fade bs-example-modal-lg custom_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="test-form">
                                        <div class="test-head">
                                            <h4>Add Post +</h4>
                                        </div>
                                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                            <div class="form-group">
                                              <label for="title">Post Title</label>
                                              <input id="title" name="title" class="form-control"  type="text" placeholder="Post Title " required>
                                            </div>

                                            <div class="form-group">
                                              <label for="subtitle">Post Subtitle</label>
                                              <input id="subtitle" name="subtitle" class="form-control"  type="text" placeholder="Post Subtitle " required>
                                            </div>

                                            <div class="form-group">
                                              <label for="title">Post Content</label>
                                              <textarea name="content" class="content" class="form-control" cols="68" rows="10" placeholder="Post Content* "></textarea>
                                            </div>
                                            
                                            
                                            <button type="submit" name="add" id="add" class="btn btn-sm btn-primary"> <i class="fa fa-plus-circle"></i>Add Post</button>
                                            <button type="reset" name="reset" id="reset" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i>Reset</button>
                                        </form>
                                        <div class="modal-form-footer">
                                            <p class="text-center"> <span class="typer" id="main" data-words="Please all * field should be fill up ." data-colors="white" data-delay="100" data-deleteDelay="1000"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Single part end-->
            <!--    
                <div class="single-part">
                    <div class="single">
                        <a href=""><i class="fa fa-calendar blue"></i></a>
                        <p>Adminstrative</p>
                        <a href="#">Adminstrative</a>
                    </div>
                </div>
            -->
                <!--Single part end-->
            </div>
        </div>
    </div>
    <!--Main  area end-->
</div>



<?php include('footer.php'); ?>
<!--=================================================
  **
  ** Includes Template Parts
  ** Footer.php
===================================================-->

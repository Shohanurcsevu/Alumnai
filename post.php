<?php 
	include_once('header.php');

    //get post id from get method
    if($_SERVER['REQUEST_METHOD']== "GET" AND isset($_GET['blog_id'])){
        $blog_id = $_GET['blog_id'];
        $blog = $blog->get_post($blog_id);
    }else{
        header('location: blog.php');
    }
?>
    <!-- Page Header -->
    <div class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-offset-2 col-lg-8 col-md-offset-1 col-md-10 mx-auto">
            <div class="site-heading">
              <h1><?php echo $blog['title'];?></h1>
              <span class="subheading"><?php echo $blog['subtitle'];?></span>
              <p class="post-meta">Posted by
		      <span style="color:#0085a1;"><?php echo $user->get_name_by_id($blog['user_id']);?></span> on <?php echo date('F d, Y', strtotime($blog['post_date']));?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content -->
<article>
      <div class="container">
        <div class="row">
          <div class="col-lg-offset-2 col-lg-8 col-md-offset-1 col-md-10 mx-auto">
          	<?php echo $blog['content'];?>
          </div>
        </div>
      </div>
    </article>

    <hr>
<?php include_once('footer.php');?>
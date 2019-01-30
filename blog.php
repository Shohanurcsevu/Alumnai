<?php include_once('header.php');?>

    <!-- Page Header -->
    <div class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-offset-2 col-lg-8 col-md-offset-1 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Alumni Blog</h1>
              <span class="subheading">Blog Posts by Alumni Committee</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-offset-2 col-lg-8 col-md-offset-1 col-md-10 mx-auto">
			<?php
				$blogs = $blog->all_blogs();
				foreach ($blogs as $blog) {
			?>
	          	<div class="post-preview">
		            <a href="post.php?blog_id=<?php echo $blog['blog_id'];?>">
		              <h2 class="post-title">
		                <?php echo $blog['title'];?>
		              </h2>
		              <h3 class="post-subtitle">
		                <?php echo $blog['subtitle'];?>
		              </h3>
		            </a>
		            <p class="post-meta">Posted by
		              <span style="color:#0085a1;"><?php echo $user->get_name_by_id($blog['user_id']);?></span> on <?php echo date('F d, Y', strtotime($blog['post_date']));?></p>

	          	</div>
	          	<hr>
			<?php
				}
			?>
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn custom-button float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>

    <hr>
<?php include_once('footer.php');?>
<div class="col-md-8 v-menu-area">
	<ul>
	    <li><a href="blog.php">Blog</a></li>
	    <li><a href="members.php">Members</a></li>
	    <?php
	    	if(isset($_SESSION['user_id'])) {
	    		echo "<li><a href='profile.php?user_id=".$_SESSION['user_id']." '>My Profile</a></li>";
	    		echo "<li><a href='messages.php'>Messages</a></li>";
	    	}
	    ?>
	</ul>
</div>
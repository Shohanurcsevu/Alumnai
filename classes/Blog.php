<?php

include_once('Database.php');
/**
* APIAttendance Management
*/
class Blog
{
    public $db;
    function __construct(){
        $this->db = new Database();
    }

    //all blogs
    public function all_blogs(){
        $sql = "SELECT * FROM blogs ORDER BY post_date ASC";
        $result = $this->db->connection->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    //add Blog
    public function add_blog($data){
    	$user_id = $_SESSION['user_id'];
    	$title = $data['title'];
    	$subtitle = $data['subtitle'];
    	$content = $data['content'];
        $sql = "INSERT INTO blogs (user_id, title, subtitle, content) VALUES ('$user_id', '$title','$subtitle', '$content')";

        if ($this->db->connection->query($sql) === TRUE) {
            $message = "Post Inserted Successfully.";
            header("location: index.php?message=$message");
        } else {
            $message = "Post Not Inserted!!";
            header("location: index.php?message=$message");
        }
    }

    //get single post
    public function get_post($blog_id){
        $sql = "SELECT * FROM blogs WHERE blog_id='$blog_id' LIMIT 1 ";
        $result = $this->db->connection->query($sql);
        $row=mysqli_fetch_assoc($result);
        if ($row) {
            return $row;
        }else{
            header('location: blog.php');
        }
    }

    //update blog post
    public function update_blog($data){
    	$blog_id = $data['blog_id'];
    	$title = $data['title'];
    	$subtitle = $data['subtitle'];
    	$content = $data['content'];
        $sql = "UPDATE blogs SET 
                title='$title', 
                subtitle='$subtitle', 
                content='$content'
                WHERE blog_id=$blog_id";

        if ($this->db->connection->query($sql) === TRUE) {
            $message = "Post Updated Successfully.";
            header("location: all_blogs.php?message=$message");
        } else {
            $message = "Post Not Updated.";
            header("location: all_blogs.php?message=$message");
        }
    }

    //delte blog
    public function delete_blog($blog_id){
        $sql = "DELETE FROM blogs WHERE blog_id='$blog_id' ";

        if ($this->db->connection->query($sql) === TRUE) {
            $message = "Blog Deleted Successfully.";
            header("location: all_blogs.php?message=$message");
        } else {
            $message = "Blog Not Deleted.";
            header("location: all_blogs.php?message=$message");
        }
    }

}
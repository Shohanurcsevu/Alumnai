<?php
/**
 * User Management
 */
class User
{
    public $db;
    function __construct(){
        include_once('Database.php');
        $this->db = new Database();
        session_start();
    }

    //register new user
    public function register($data){
    	//data validation
        $name = mysqli_real_escape_string($this->db->connection, htmlspecialchars(trim($data['name'])));
        $department_name = mysqli_real_escape_string($this->db->connection, htmlspecialchars(trim($data['department_name'])));
        $roll = mysqli_real_escape_string($this->db->connection, htmlspecialchars(trim($data['roll'])));
        $session = mysqli_real_escape_string($this->db->connection, htmlspecialchars(trim($data['session'])));
        $passing_year = mysqli_real_escape_string($this->db->connection, htmlspecialchars(trim($data['passing_year'])));
        $email = mysqli_real_escape_string($this->db->connection, htmlspecialchars(trim($data['email'])));
        $unhashed_password = mysqli_real_escape_string($this->db->connection, htmlspecialchars(trim($data['password'])));
        $password = md5($unhashed_password);

        //data insert query
       	$sql = "INSERT INTO users (name, department_name , roll, session, passing_year, email , password) VALUES ('$name', '$department_name', '$roll', '$session', '$passing_year', '$email', '$password')";

       	//redirect to pages
        if ($this->db->connection->query($sql) === TRUE) {
            //insert user id into profiles table
            $last_id = $this->db->connection->insert_id;
            $profile_sql = "INSERT INTO profiles (user_id) VALUES ('$last_id')";
            $this->db->connection->query($profile_sql);

            $message = "User Inserted Successfully.";
            header("location: login.php?message=$message");
        } else {
            $message = "User Not Inserted!!";
            header("location: signup.php?message=$message");
        }
    }

    //login user
    public function login($data){
        //data validation
        $email = mysqli_real_escape_string($this->db->connection, htmlspecialchars(trim($data['email'])));
        $unhashed_password = mysqli_real_escape_string($this->db->connection, htmlspecialchars(trim($data['password'])));
        $password = md5($unhashed_password);

        //check email and password 
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND verify_status='1' ";
        $result = $this->db->connection->query($query);

        
        if($result->num_rows > 0){        	
            $user = $result->fetch_assoc();
            $user_id = $user['user_id'];
            $name = $user['name'];
            $user_type = $user['user_type'];
            $last_activity = $user['last_activity'];

            //set user sessions
            $_SESSION['user_id'] = $user_id;
            $_SESSION['name'] = $name;
            $_SESSION['last_activity'] = $last_activity;

            //user type session 
            if($user_type=="admin"){
            	$_SESSION['user_type'] = $user['user_type'];
            	header("location: admin/index.php");
            }else{
            	$_SESSION['user_type'] = $user['user_type'];
            	header("location: index.php");
            }
        }else{
            $message = "Username or Password Not Matched or Account not verified yet.";
            header("location: login.php?message=$message");
        }
    }

    //logout function
    public function logout(){
        session_destroy();
        $message = "Please Login To Continue.";
        header("location: login.php?message=$message");
    }

    //check if user is admin or not
    public function is_admin(){
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']==="admin"){
            return true;
        }else{
            return false;
        }
    }

    //get all users
    public function all_users(){
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM users LEFT JOIN profiles ON users.user_id = profiles.id WHERE users.user_id !='$user_id' ORDER BY users.verify_status ASC, users.passing_year ASC  ";
        $result = $this->db->connection->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    //get single user
    public function get_user($user_id){
        $sql = "SELECT * FROM users LEFT JOIN profiles ON users.user_id = profiles.id WHERE users.user_id='$user_id' LIMIT 1 ";
        $result = $this->db->connection->query($sql);
        $row=mysqli_fetch_assoc($result);
        if ($row) {
            return $row;
        }else{
            header('location: members.php');
        }
    }

    //update user
    public function update_user($data){

        $user_id = $data['user_id'];
        $name = $data['name'];
        $roll = $data['roll'];
        $department_name = $data['department_name'];
        $session = $data['session'];
        $passing_year = $data['passing_year'];
        $email = $data['email'];
        $user_type = $data['user_type'];
        $verify_status = $data['verify_status'];

        $sql = "UPDATE users SET 
                name='$name', 
                roll='$roll', 
                department_name='$department_name', 
                session='$session', 
                passing_year='$passing_year', 
                email='$email', 
                user_type='$user_type', 
                verify_status='$verify_status' 
                WHERE user_id=$user_id";
        if ($this->db->connection->query($sql) === TRUE) {
            $message = "User Data Updated Successfully.";
            header("location: student-list.php?message=$message");
        } else {
            $message = "User Data Not Updated.";
            header("location: student-list.php?message=$message");
        }
    }

    //update user
    public function update_frontend_profile($data){
        $user_id = $data['user_id'];
        $name = $data['name'];
        $department_name = $data['department_name'];
        $roll = $data['roll'];
        $session = $data['session'];
        $passing_year = $data['passing_year'];
        $email = $data['email'];
        $birth_date = $data['birth_date'];
        $mobile_no = $data['mobile_no'];
        $nationality = $data['nationality'];
        $marital_status = $data['marital_status'];
        $address = $data['address'];
        $work_title = $data['work_title'];
        $work_description = $data['work_description'];

        $sql = "UPDATE users LEFT JOIN profiles on users.user_id = profiles.id SET 
                users.name = '$name',
                users.user_id = '$user_id',
                users.department_name = '$department_name',
                users.roll = '$roll',
                users.session = '$session',
                users.passing_year = '$passing_year',
                users.email = '$email',
                profiles.birth_date = '$birth_date',
                profiles.mobile_no = '$mobile_no',
                profiles.nationality = '$nationality',
                profiles.marital_status = '$marital_status',
                profiles.address = '$address',
                profiles.work_title = '$work_title',
                profiles.work_description = '$work_description'
                WHERE users.user_id='$user_id' ";

        if ($this->db->connection->query($sql) === TRUE) {
            $message = "User Data Updated Successfully.";
            header("location: editprofile.php?user_id=$user_id&message=$message");
        } else {
            $message = "User Data Not Updated.";
            header("location: editprofile.php?user_id=$user_id&message=$message");
        }      
    }

    //delete user
    public function delete_user($user_id){
        $sql = "DELETE FROM users WHERE user_id='$user_id' ";

        if ($this->db->connection->query($sql) === TRUE) {
            $message = "User Deleted Successfully.";
            header("location: student-list.php?message=$message");
        } else {
            $message = "User Not Deleted.";
            header("location: student-list.php?message=$message");
        }
    }

    //get user name by user id
    public function get_name_by_id($user_id){
        $sql = "SELECT name FROM users WHERE user_id='$user_id' LIMIT 1";
        $result = $this->db->connection->query($sql);
        $row=mysqli_fetch_assoc($result);
        if ($row) {
            return $row['name'];

        } else {
            return false;
        }
    }

    //get use active status
    public function user_active_status($user_id){
        //get user online or offline status
        $status = '';
        //get current time
        $current_time = date("Y-m-d H:i:s",time());
        //get user last activity
        $user_last_activity = $this->get_user_last_activity($user_id);
        $time_difference = strtotime($user_last_activity) - strtotime($current_time);
        if($time_difference > 10){
            $status = 'online';
        }else
        {
            $status = 'offline';
        }

        return $status;
    }
    //ajax fetch user
    public function ajax_fetch_user(){
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE user_id != '$user_id' ";
        $result = $this->db->connection->query($sql);
        $output = "";

        foreach($result as $row){
            //get user online or offline status
            $status = $this->user_active_status($row['user_id']);
            $btn_style = "";
            if($status=='online'){
                $btn_style = 'success';
            }else{
                $btn_style = 'danger';
            }

            //generate ajax output
            $output .="
                <tr>
                   <td>".$row['name']."</td>
                   <td>".$row['email']."</td>
                   <td>
                       <a href='profile.php?user_id=".$row['user_id']."' class='btn btn-primary btn-xs'>view</a>
                        <a type='button' class='btn btn-".$btn_style." btn-xs start_chat' style='padding-left:10px;' href='send_message.php?user_id=".$row['user_id']."'><i class='fa fa-comment'></i></a>
                   </td>
                </tr>
            ";
        }

        echo $output;
    }

    //update user last activity
    public function update_user_activity($user_id){

        $sql = "UPDATE users SET last_activity= now() WHERE user_id=$user_id";

        if ($this->db->connection->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    //return user last activity
    public function get_user_last_activity($user_id){
        $sql = "SELECT last_activity FROM users WHERE user_id='$user_id' LIMIT 1";
        $result = $this->db->connection->query($sql);
        $row=mysqli_fetch_assoc($result);

        if ($row) {
            return $row['last_activity'];
        } else {
            return false;
        }
    }

}


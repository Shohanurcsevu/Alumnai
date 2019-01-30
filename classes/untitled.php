    //update user
    public function update_user($data){
        $user_id = $data['user_id'];
        
        foreach ($data as $key => $value) {
         $field_string .= $key."=".$value." , ";
        }

        $field_string = rtrim($field_string, " , ");

        $sql = "UPDATE users SET ".$field_string." WHERE user_id='$user_id' ";
        /*
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
        */        
        if ($this->db->connection->query($sql) === TRUE) {
            $message = "User Data Updated Successfully.";
            header("Location: {$_SERVER['HTTP_REFERER']}&message=$message");
        } else {
            $message = "User Data Not Updated.";
            header("Location: {$_SERVER['HTTP_REFERER']}&message=$message");
        }
    }
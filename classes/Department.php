<?php

class Department{

    public $db;

    function __construct(){
        include_once('Database.php');
        $this->db = new Database();
    }
    //add department
    public function add_department($department_name){
        $sql = "INSERT INTO departments (department_name) VALUES ('$department_name')";
        if ($this->db->connection->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    //all departments
    public function all_department(){
        $sql = "SELECT * FROM departments ORDER BY department_name ASC";
        $result = $this->db->connection->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    //update department
    public function update_department($data){
        $department_id = $data['department_id'];
        $department_name = $data['department_name'];
        $sql = "UPDATE departments SET department_name='$department_name' WHERE department_id=$department_id";
        if ($this->db->connection->query($sql) === TRUE) {
            $message = "Department Updated Successfully.";
            echo "<script>window.location = 'departments.php?message=$message';</script>";
        } else {
            $message = "Department  Not Updated.";
            echo "<script>window.location = 'departments.php?message=$message';</script>";
        }
    }

    //delete department
    public function delete_department($department_id){
        $sql = "DELETE FROM departments WHERE department_id=$department_id";

        if ($this->db->connection->query($sql) === TRUE) {
            $subject_sql = "DELETE FROM subjects WHERE department_id=$department_id";
            if ($this->db->connection->query($subject_sql) === TRUE) {
                $message = "Department Deleted Successfully.";
                echo "<script>window.location = 'departments.php?message=$message';</script>";
            }else{
                $message = "Department Deleted Successfully.";
                echo "<script>window.location = 'departments.php?message=$message';</script>";
            }

        } else {
            $message = "Department Not Deleted.";
            echo "<script>window.location = 'departments.php?message=$message';</script>";
        }
    }

}
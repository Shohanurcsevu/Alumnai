<?php
/**
* Database
*/
class Database
{

	public $host   = "localhost";
    public $user   = "root";
    public $pass   = "";
    public $dbname = "alumni";

	public $connection;
	
	function __construct(){
		$this->connection = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if($this->connection->connect_errno){
			die("Database connection failde". $this->connection->connect_errno);
		}
	}
	

}
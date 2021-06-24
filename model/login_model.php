<?php
include'database.php';
class login_Model{
	public $username;
	public $password;
	public $database;

	//constructor for creating databse object
	public function __construct(){
		$this->database=new Database();
	//	echo "string";
	}
	//setter method
	public function setUsername($username){
		$this->username=$username;
	}

	public function setPassword($password){
		$this->password=$password;
		//echo $this->password;
	}
	//login logic database
	public function logins(){
		$query="SELECT username,password,type,uid from user where username='$this->username' and password='$this->password'";
		//echo "$query";
		return $this->database->fetch($query);


	}
}
?>
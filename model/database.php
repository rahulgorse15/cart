<?php

class Database{
	public $server="localhost";
	public $user="root";
	public $password="";
	public $db="cart";
	public $con;
	public function __construct(){
		$this->con=mysqli_connect($this->server,$this->user,$this->password,$this->db);

	
	}
	//fetch sigle record
	public function fetch($query){
		//echo "$query";
		if($data=mysqli_query($this->con,$query)){
			$row=mysqli_fetch_array($data);
			return $row;
		//	print_r($row);
		}
		else{
			print_r(mysqli_error($this->con));
		}
	}
	public function fetchall($query){
		$resultset;
		try{
		if($data=mysqli_query($this->con,$query)){
			while($row=mysqli_fetch_assoc($data)){
				$resultset[]=$row;
			}
		}
		else{
			$_SESSION['success']=mysqli_error($this->con);
		}
		return $resultset;
		}
		catch(Exeption $e){
			echo $e;
		}
	}

	public function insertone($query){
		try{
			if($res= mysqli_query($this->con,$query)){
				
				return $res;
			}
			else{
				$_SESSION['success']="something went wrong please try again later";
				return null;
			}
		}
		catch(Exeption $e){
			echo $e;
		}
	}

	public function __destruct(){
		mysqli_close($this->con);
	}
}

?>
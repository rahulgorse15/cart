<?php
//session_start();
include'./model/login_model.php';
class login_Controller{
	protected $model;
	public function __construct(){
		$this->model=new login_Model();
	}
	public function handler(){
		try{
		include'./view/login_view.php';
		if($_POST['submit']){
			$this->model->setUsername($_POST['username']);
			$this->model->setPassword($_POST['password']);
			$result=$this->model->logins();
			if($result>0){
				if($_POST['remember']){
				$_SESSION['rememberme']="Remember";
				setcookie("login", $_POST['username'], time() + 240, '/');
			}
				foreach($result as $key => $value) {
					$_SESSION['success']="Login Successfully";
				$_SESSION['name']=$result['username'];
				$_SESSION['type']=$result['type'];
				$_SESSION['uid']=$result['uid'];
				header("Location:./index.php?op=home");
			}
			}
			else{
				echo '<script>alert("login failed please try again")</script>'; 
				
		}
		
			}
	}
	catch(Exception $e){
		echo $e;
	}
}
}

?>
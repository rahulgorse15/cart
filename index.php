<?php
error_reporting(0);
session_start();

try{

if(!$_SESSION['name']){
	include'./controller/login_controller.php';
	$login=new login_Controller();
	$login->handler();
}
else{
	$op = isset($_GET['op'])?$_GET['op']:'home';
	if($op=="home"){
		include'./controller/home_controller.php';
	$home=new home_Controller();
	$home->handler();
	
	}
	if($op=="cartdetails"){
		include'./controller/cart_controller.php';
	$home=new cart_Controller();
	$home->handler();
	
	}
		if($op=="delete"){
		include'./controller/cart_controller.php';
	$home=new cart_Controller();
	$home->delete();
	
	}

	else if($op=='logout'){
		?>
	<script type="text/javascript">
		alert("logout Successfully");
	</script>
	
	<?php
		setcookie("login", "", time() - 3600);
		session_destroy();
		header("location:index.php"); 	
	}
}

}
catch(Exception $e){
	echo "something went wrong please try again later".$e;
}


?>
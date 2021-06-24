<?php
if(isset($_SESSION['rememberme'])){
if(!isset($_COOKIE['login'])){
	session_destroy();
}
}
elseif(! $_SESSION['name']){
	header('Location:.index.php');
}
if(isset($_SESSION['success']))
	{
	?>
	<script type="text/javascript">
		alert("<?php echo $_SESSION['success']; ?>");
	</script>
	
	<?php
	
	}
	unset($_SESSION['success']);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<title></title>
</head>
<body>
	<div style="background-color: darkmagenta">
<row hight="20%" id="table" style="color: white">
	 <br><p><td style="margin-right: 15%" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;welcome <?php echo $_SESSION['name']?></td><a  style="color: white; margin-left: 75%;" href="index.php?op=logout">Logout</a></p>
<br>
</row>
</div>
</body>
</html>
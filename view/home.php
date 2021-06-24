<?php
//	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	</head>
<body  >

	<ul style="color: darkmagenta">Product Management
		<row><li><a style="color: darkmagenta" href="./index.php?op=home">Product List</a></li></row>
		<row><li><a style="color: darkmagenta" href="./index.php?op=cartdetails">Product Cart  (<?php print_r($_SESSION['cartitem'][0]);?>)</a></li></row>
	</ul>
</body>
</html>
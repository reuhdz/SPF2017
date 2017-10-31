<DOCTYPE! html>
<html>
<head>
	<title>Logout</title>
</head>
<body>
	<?php
		setcookie("user","",time() - 3600,'/');
		echo 'You are logged out';
	?>
<br>
<a href="login.php">Login</a>
</body>
</html>

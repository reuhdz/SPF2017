<DOCTYPE! html>
<html>
<body>
<?php
	function Connect(){
		$dbhost = "*****";
		$dbuser = "*****";
		$dbpass = "*****";
		$dbname = "*****";
		
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
			
		return $conn;
	}
?>
</body>
</html>

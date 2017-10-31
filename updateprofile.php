<DOCTYPE! html>
<html>
<head>
    <title>Update Profile</title>
</head>
<body>
<?php
	$cookie_name ="user";
        if(!isset($_COOKIE[$cookie_name])){
            echo "Please login in first<br/>";
            echo '<a href="login.php">Login Page</a>';
        }

        else {
			require 'dbconnection.php';
			$conn = Connect();
			$query = "select address, state, city, zipcode, telephone
					  from employee
			  		  where loginID = '$_COOKIE[$cookie_name]'";
		//print "$query <br>\n";
			$result = $conn->query($query);
			$row_ct = $result->num_rows;
			$row = $result->fetch_assoc();
			$address = $row['address'];
			$state = $row['state'];
			$city = $row['city'];
			$zip = $row['zipcode'];
			$tele = $row['telephone'];

      		print  '<form action="updcomplete.php" method="post">
			<h2>Update Profile</h2><br><br>
			Address:  
			<input type = "text" name = "address" value ="'.$address .'"><br/>
			State: 
			<input type = "text" name = "state" value = "'.$state.'"><br>
			City: 
			<input type ="text" name = "city" value = "'.$city.'"><br>
			Zipcode: 
			<input type = "text" name = "zip" value = "'.$zip.'"><br>
			Telephone: 
			<input  type = "text" name= "tele" value = "'.$tele.'"><br><br>
			<input  type = "submit" value="submit">
			</form>'; 
		}

	$result->close();
	$conn->close();
?>
</body>
</html>



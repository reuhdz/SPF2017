<?php
	$cookie_name = "user";
	require 'dbconnection.php';
	$conn    = Connect();

	$address    = $conn->real_escape_string($_POST['address']);
	$state    = $conn->real_escape_string($_POST['state']);
	$city    = $conn->real_escape_string($_POST['city']);
	$zip   = $conn->real_escape_string($_POST['zip']);
	$tele    = $conn->real_escape_string($_POST['tele']);
	$query   = "update employee 
	    		set address ='$address',state = '$state', city = '$city', zipcode = '$zip', telephone = '$tele' 
	    		where loginID = '$_COOKIE[$cookie_name]' ";
	$update = $conn->query($query);
 
	if (!$update) {
    	die("Couldn't update information: ".$conn->error);
 	}
 
	echo "Information Updated <br>";
	echo '<a href="welcome.php">Go back to homepage</a>';

	$update->close();
	$conn->close();
?>
<?php
	require 'dbconnection.php';
	$conn = Connect();
	$loginID = $conn->real_escape_string($_POST['loginID']);
	$fName = $conn->real_escape_string($_POST['fName']);
	$lName = $conn->real_escape_string($_POST['lName']);
	$address = $conn->real_escape_string($_POST['address']);
	$state = $conn->real_escape_string($_POST['state']);
	$city = $conn->real_escape_string($_POST['city']);
	$zip = $conn->real_escape_string($_POST['zip']);
	$tele = $conn->real_escape_string($_POST['tele']);
	$passwd = $conn->real_escape_string($_POST['passwd']);
	$passwd2 = $conn->real_escape_string($_POST['confirm']);
		
	if( $passwd === $passwd2){	
		$query ="INSERT INTO employee(loginID, fName, lName, passwd, address, state, city, zipcode, telephone)
			 VALUES ('".$loginID."','".$fName."','".$lName."',encrypt('".$passwd."','******') ,'".$address."','".$state."','".$city."','".$zip."','".$tele."')";

	}
	else{
		print "Passwords  did not match <br/>";
	}
		//print "$query <br/>\n";
		$success = $conn->query($query);


	if(!$success){
		die("Couldn't sign-up. ". $conn->error);
	}
	
	print "<h2>You Are Signed Up</h2><br>";
	print'<a href="login.php">Login here</a>';
	$conn->close();
?>

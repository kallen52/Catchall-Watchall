<?php

// Grab User submitted information
$username = $_POST["user"];
$password = $_POST["pass"]; 



// Create connection #servername, username, password, db 
$conn = mysqli_connect("localhost", "root", "","catchall_watchall");
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT username FROM account where username='$username'";
$result = $conn->query($sql);
$check =mysqli_fetch_array($result);

if(isset($check)){

	echo 'Account already exists.';
}

else
{
	$usernamelength = strlen($username);
	$passwordlength = strlen($password);
	if($usernamelength<3) {
		echo 'Username must be at least 3 characters.';
		exit;
	}
	if($passwordlength<3) {
		echo 'Password must be at least 3 characters.';
		exit;
	}
	a:
	$accountID = rand(1, 2147483646);
	$sql = "SELECT account_id FROM account where account_id='$accountID'";
	$result = $conn->query($sql);
	$check =mysqli_fetch_array($result);
	if(isset($check)){
		echo 'Account ID in use.';
		goto a;
	}
	else {
	$sql = "INSERT INTO account VALUES('$accountID','$username','$password','loggedout')"; 
	$conn->query($sql);
	echo 'Account created successfully! You can now login.';
	header("Location: login.php");
	exit;
	}
}

?>
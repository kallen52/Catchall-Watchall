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
//echo "Connected successfully";

//mysql_select_db("class",$con);

// $username = stripcslashes($username);
// $password = stripcslashes($password);
// $username = mysqli_real_escape_string($conn, $username);
// $password = mysqli_real_escape_string($conn, $password);

$sql = "SELECT username, password  FROM account where username='$username' and password= '$password'";
$result = $conn->query($sql);
$check =mysqli_fetch_array($result);

if(isset($check)){
	$sql = "UPDATE account SET status= 'loggedin' WHERE username='$username' and password= '$password'"; 
	$conn->query($sql); //code to execure query
	header("Location: index.php"); //go to the home page
	exit;
}

else
{
	echo 'Incorrect username or password';
}

?>
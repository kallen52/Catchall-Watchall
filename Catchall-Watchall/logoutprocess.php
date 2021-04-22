<?php

// Create connection #servername, username, password, db 
$conn = mysqli_connect("localhost", "root", "","catchall_watchall");
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE account SET status= 'loggedout'"; 
$conn->query($sql); //code to execure query

header("Location: login.php"); //go to the login page
exit;

?>
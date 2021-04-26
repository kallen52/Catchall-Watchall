<?php
// Create connection #servername, username, password, db 
$conn = mysqli_connect("localhost", "root", "","catchall_watchall");
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

$option =  explode(",", $_POST["option"]);
$option_account = $option[0];
$option_content = $option[1];

$sql = "DELETE FROM watchlist WHERE account_id='$option_account' and content_id='$option_content'"; 
$conn->query($sql); //code to execure query

header("Location: watchlist.php"); //go back the watchlist page
exit;

?>
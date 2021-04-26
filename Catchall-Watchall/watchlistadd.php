<?php
// Create connection #servername, username, password, db 
$conn = mysqli_connect("localhost", "root", "","catchall_watchall");
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

$content=$_POST["option"];

$sql = "SELECT account_id FROM account WHERE status='loggedin'"; 
$result=mysqli_query($conn,$sql); //code to execure query
$account=mysqli_fetch_assoc($result);

$account2= $account["account_id"];

$sql = "INSERT INTO watchlist VALUES('$account2','$content')"; 
$conn->query($sql); //code to execure query

header("Location: index.php"); //go back to home
exit;
 
?>
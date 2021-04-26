<?php echo file_get_contents("header.html"); ?>
<?php echo file_get_contents("body.html"); ?>

<!DOCTYPE html>
<html>

<body>
    <h3>Search for shows and movies</h3>
<form method="post">
	<label>Search</label>
	<input type="text" name="search" required>
	<input type="submit" name="submit">
</form>

<br>

<p><a href="http://localhost/Catchall-Watchall/index.php" class="btn btn-primary btn-large">Reset</a></p>

</body>
</html>


<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "catchall_watchall";

$conn = mysqli_connect($server, $username, $password, $dbname);

if(isset($_POST["submit"])){
	$str = mysqli_real_escape_string($conn,$_POST['search']); //get string
	$sql = "SELECT content.content_id, content.name, content.type, services.service_name FROM content INNER JOIN services ON content.content_id=services.content_id WHERE content.name LIKE '%$str%' ORDER BY content.name;"; //run sql on string given

	$result = mysqli_query($conn,$sql); //store the result in a variable

	if($result){ //if result exists
		while($row = mysqli_fetch_assoc($result)){ //loop through each row and output whats needed
			printf("Name: %s (%s), Streaming Service: %s", $row["name"], $row["type"], $row["service_name"]);
			echo "<br><br>";
		}

	}
	else{ //when no results found
		echo "No search Results. <br>"; 
	}
}

echo "<h4>Want to add something to your watchlist?</h4>";
if(isset($_POST["submit"])){
$str = mysqli_real_escape_string($conn,$_POST['search']); //get string
$sql = "SELECT content.content_id, content.name, content.type, services.service_name FROM content INNER JOIN services ON content.content_id=services.content_id WHERE content.name LIKE '%$str%' ORDER BY content.name;";
$result = $conn->query($sql) or die($conn->error);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<form action=watchlistadd.php method='post'>";
  while($row = $result->fetch_assoc()) {
    echo "<input type='radio' name='option' value=",$row["content_id"]," /><label>", $row["name"], "</label> ";
    //echo $row["account_id"]," , ", $row["content_id"];
    echo "<br>";
  }
  echo "<input type='submit' value='Submit'>";
  echo "</form>";
}
else {
  
  echo "<h5>There's nothing to add right now. Try searching for a show or movie.</h5>";

}
}
?>
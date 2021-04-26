

<!DOCTYPE html>
<html>
<head>
	<title>Search Bar using PHP</title>
</head>
<body>
	<form method="post">
	<label>Search</label>
	<input type="text" name="search" required>
	<input type="submit" name="submit">
</form>

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
?>




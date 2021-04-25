<?php echo file_get_contents("header.html"); ?>
<?php echo file_get_contents("body.html"); ?>


<?php
//The basis for the following code was seen in https://www.w3schools.com/php/php_mysql_select.asp
// Create connection #servername, username, password, db 
$conn = mysqli_connect("localhost", "root", "","catchall_watchall");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  $sql = "SELECT content_id, name, type FROM content";
  $result = $conn->query($sql) or die($conn->error);
  
  if ($result->num_rows > 0) {
    // output data of each row
    echo "<table class='table'><tr><th>Name</th><th>Type</th></tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["name"]. "</td><td>" . $row["type"]. "</td></tr>";
    }
    echo "</table>";
  }
  else {
    echo "There's nothing on your watchlist. Try searching something you want to watch and add it.";

  }

  mysqli_close($conn);
  ?>
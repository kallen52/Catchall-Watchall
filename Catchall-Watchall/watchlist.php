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
  
  $sql = "SELECT name, type FROM content NATURAL JOIN watchlist WHERE account_id = ( SELECT account_id FROM account WHERE status = 'loggedin' )";
  $result = $conn->query($sql) or die($conn->error);
  
  if ($result->num_rows > 0) {
    // output data of each row
    echo "<table class='table'><tr><th>Name</th><th>Type</th></tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["name"]. "</td><td>" . $row["type"]. "</td></tr>";
    }
    echo "</table>";
    echo "<br>";
  }
  else {

    echo "<h3>There's nothing on your watchlist. Try searching something you want to watch and add it.</h3>";
    echo "<br>";

  }

  //mysqli_close($conn);

  echo "<h4>Want to delete something from your watchlist?</h4>";
  $sql = "SELECT name, account_id, content_id FROM content NATURAL JOIN watchlist WHERE account_id = ( SELECT account_id FROM account WHERE status = 'loggedin' )";
  $result = $conn->query($sql) or die($conn->error);
  
  if ($result->num_rows > 0) {
    // output data of each row
    echo "<form action=watchlistdelete.php method='post'>";
    while($row = $result->fetch_assoc()) {
      echo "<input type='radio' name='option' value=",$row["account_id"],",",$row["content_id"]," /><label>", $row["name"], "</label> ";
      //echo $row["account_id"]," , ", $row["content_id"];
      echo "<br>";
    }
    echo "<input type='submit' value='Submit'>";
    echo "</form>";
  }
  else {
    
    echo "<h5>(There's nothing to delete)</h5>";

  }

  mysqli_close($conn);
  ?>

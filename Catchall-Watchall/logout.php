<?php echo file_get_contents("header.html"); ?>
<?php echo file_get_contents("body.html"); ?>


<html>
    <form action="logoutprocess.php">
    <div class="jumbotron">
        <h3>Are you sure you want to log out?</h3>
        <p><input class="btn btn-primary btn-large" type="submit" value="Yes">  <a href="http://localhost/Catchall-Watchall/index.php" class="btn btn-primary btn-large">No</a></p>
    </div>
    </form>
<html>
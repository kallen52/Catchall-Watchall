
<?php echo file_get_contents("body.html"); ?>


<body>

	<div id="frm">
    <form method="post" action="process.php" >
	
		<p>
      <center>
        <H1>Catchall Watchall Login
      </center> 
		</p>
         <p>
		        <center>
              <label>User Name</label>
              <input type="text" name="user" id="user">
				
         
        
              <label>Password</label>
              <input type="text" name="pass" id="pass">

            </center> 
        </p>
      <center>
        <input type="submit" id="btn" value="Login"/>        
			</center>
    </form>
	</div>
  <div>
  <br>
  <center>
    <p><a href="http://localhost/Catchall-Watchall/register.php" class="btn btn-primary btn-large">Create an Account</a></p>
  </center>
  </div>
</body>
</html>
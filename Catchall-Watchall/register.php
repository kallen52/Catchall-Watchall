<?php echo file_get_contents("body.html"); ?>
<body>

	<div id="frm">
    <form method="post" action="processcreation.php" >
	
		<p>
      <center>
        <H1>Catchall Watchall Account Creation
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
        <input type="submit" id="btn" value="Create Account"/>        
			</center>
    </form>
	</div>
</body>
</html>
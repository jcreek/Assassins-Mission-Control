<?php include "base.php"; ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">    
<head>    
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
	<title>Assassins Mission Control</title>  
	<link rel="stylesheet" href="style.css" type="text/css" />  
</head>    
<body>    
	<div id="main" style='width: 90%;'> 
	<h1 style='text-align: center; padding-bottom: 15px;'>Mission Control Admin Tools</h1>
		<div style='float:left; border-style: dotted; padding: 2%; width: 60%;'>
	    <p><a href="admin-tools/create-users-table.php">Create users table</a></p>

	    <p><a href="admin-tools/close-registration.php">Close registration</a></p>

	    <p><a href="admin-tools/startgame.php">Start the game</a></p>
		</div>
	
		<div style='float:right; border-style: dotted; padding: 2%; width: 20%;'>
		<p><a href="admin-tools/adminer-sql.php">Log in to the database and modify the table directly</a>
		<br>N.B. You will need to know the database server, user, password and database name. The table to modify is 'usersfinal' once the game has started.</p>
		</div>
	</div>  
</body>  
</html> 
		
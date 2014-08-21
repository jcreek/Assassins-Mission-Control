<?php include "base.php"; ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">    
<head>    
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
	<title>Assassins Mission Control</title>  
	<link rel="stylesheet" href="style.css" type="text/css" />  
</head>    
<body>    
	<div id="main"> 
		
	    <form method="post" action="admin-tools/create-users-table.php" name="create-users-table" id="create-users-table">  
	    <fieldset> 
	        <input type="submit" name="create-users-table" id="create-users-table" value="Create Users Table" />  
	    </fieldset>  
	    </form>  

	    <form method="post" action="admin-tools/startgame.php" name="startgame" id="startgame">  
	    <fieldset> 
	        <input type="submit" name="startgame" id="startgame" value="Start Game" />  
	    </fieldset>  
	    </form>  

	    <form method="post" action="admin-tools/close-registration.php" name="close-registration" id="close-registration">  
	    <fieldset> 
	        <input type="submit" name="close-registration" id="close-registration" value="Close Registration" />  
	    </fieldset>  
	    </form>  
	    
		
		
		
		
	</div>  
</body>  
</html> 
		
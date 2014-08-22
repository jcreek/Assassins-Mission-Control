<?php include "../base.php"; 

// This page is password protected as it resets the entire game so needs to not be done by accident. 

// Define your username and password 
$password = "reset-the-game"; 

if ($_POST['txtPassword'] != $password) { 

?> 

<h1>Confirm Assassins Game Reset</h1> 

<p>First you must download a copy of the game results</p>
<p><a href="export-csv.php">Export CSV</a></p>

<form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
    <p>If you are certain that you want to reset the game then enter the following password in the box below:
    <br>reset-the-game</p> 

    <p><label for="txtpassword">Password:</label> 
    <br /><input type="password" title="Enter the password" name="txtPassword" /></p> 

    <p><input type="submit" name="Submit" value="Login" /></p> 

</form> 

<?php 

} 
else { // here is where the actual reset code happens following login

// rename the game-begun file to game-not-started
rename("game-begun","game-not-started");

// export the contents of the usersfinal table just in case it was an accident or the results are needed again 




} 

?> 





<?php include "../base.php"; 

// This page is password protected as it resets the entire game so needs to not be done by accident. 

// Define your username and password 
$password = "reset-the-game"; 

if ($_POST['txtPassword'] != $password) { 

?> 

<h1>Confirm Assassins Game Reset</h1> 

<p>First you must download a copy of the game results</p>
<p><a href="export-csv.php">Export CSV</a></p> <?php// export the contents of the usersfinal table just in case it was an accident or the results are needed again?> 

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

//rename the addresses-released file to addresses-not-released
rename("addresses-released","addresses-not-released");

// delete the two users tables
$retval1 = mysql_query("DROP TABLE users");
if(! $retval1 )
{
  die('Could not delete users table: ' . mysql_error());
}
echo "Users table deleted successfully\n";

$retval2 = mysql_query("DROP TABLE usersfinal");
if(! $retval2 )
{
  die('Could not delete usersfinal table: ' . mysql_error());
}
echo "Usersfinal table deleted successfully\n";

// empty the upload folder of all user photos
$files = glob('../upload/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}


} 

Echo "<br>"
Echo "End of the reset page reached. Unless there are error messages above everything is reset!"

?> 

<?php include "return-to-admin-page.php"; ?>
<head>
<link rel="icon" type="image/png" href="favicon.png">
</head>

<?php  //this code creates the database connection for all pages that need it
session_start();  
  
$dbhost = "localhost"; // this will ususally be 'localhost', but can sometimes differ  
$dbname = "assassins"; // the name of the database that you are going to use for this project  
$dbuser = "root"; // the username that you created, or were given, to access your database  
$dbpass = "root"; // the password that you created, or were given, to access your database  
  
mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());  
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());  
//echo "success in database connection."; //Uncomment this line if you want to check if a page is loading this database connection code
?>  
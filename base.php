<?php  
session_start();  
  
$dbhost = "mysql.hostinger.co.uk"; // this will ususally be 'localhost', but can sometimes differ  
$dbname = "u231858558_main"; // the name of the database that you are going to use for this project  
$dbuser = "u231858558_user"; // the username that you created, or were given, to access your database  
$dbpass = "Passwords1"; // the password that you created, or were given, to access your database  
  
mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());  
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());  
?>  
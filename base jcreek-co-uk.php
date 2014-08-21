<?php  
session_start();  
  
$dbhost = "db381141882.db.1and1.com"; // this will ususally be 'localhost', but can sometimes differ  
$dbname = "db381141882"; // the name of the database that you are going to use for this project  
$dbuser = "dbo381141882"; // the username that you created, or were given, to access your database  
$dbpass = "J15h9933"; // the password that you created, or were given, to access your database  
  
mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());  
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());  
?>  
<?php include "../base.php"; 

// Copy the contents of the table 'users' into 'users-final'
//mysql_query("SELECT * INTO usersfinal FROM users");

//Error checking should go here but I couldn't be bothered to do it yet. 



mysql_query("CREATE TABLE usersfinal SELECT * FROM users");
?>
<?php include "return-to-admin-page.php"; ?>
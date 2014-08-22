<?php include "../base.php"; 


// Create table
$sql = "CREATE TABLE users (  
UserID INT(25) NOT NULL AUTO_INCREMENT PRIMARY KEY,  
AssassinID INT(25) NOT NULL,
TargetID INT(25) NOT NULL,
Username VARCHAR(65) NOT NULL,  
Password VARCHAR(32) NOT NULL,  
FullName VARCHAR(255) NOT NULL,
YearGroup VARCHAR(65) NOT NULL, 
Subject VARCHAR(65) NOT NULL, 
Societies text NOT NULL, 
RegularHaunts text NOT NULL, 
Ninjaness int NOT NULL, 
Address VARCHAR(255) NOT NULL,
Kills int NOT NULL, 
Status VARCHAR(65) NOT NULL  
)";

// Check table has been created 
	// THIS IS NEEDED TO RUN THE SQL AND WHO WOULD NOT USE ERROR CHECKING ANYWAY?!
if (mysql_query($sql))
{
 echo "Users table created.";
}
else 
{
 echo "Failed to create users table - check your database details in base.";
}


?>
<?php include "return-to-admin-page.php"; ?>
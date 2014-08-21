<?php include "base.php"; ?>  
<!DOCTYPE html> 
<html>  
<head>    
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
	<title>Assassins Mission Control</title>  
	<link rel="stylesheet" href="style.css" type="text/css" />  
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine&amp;v1" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
</head>    
<body>    
    <div id="main">
      <div id="header">
        <div id="logo">
          <h1>assassins<a href="#">MissionControl</a></h1>
          <div class="slogan">Exeter University Hide & Seek Society</div>
        </div>
      <div id="site_content">
		  
<?php  
if(!empty($_POST['username']) && !empty($_POST['password']))  
{  
    $assassinid = 0;  
	$targetid = 0;
	$username = mysql_real_escape_string($_POST['username']);  
    $password = md5(mysql_real_escape_string($_POST['password']));  
	$fullname = mysql_real_escape_string($_POST['fullname']); 
	$yeargroup = mysql_real_escape_string($_POST['yeargroup']); 
	$subject = mysql_real_escape_string($_POST['subject']); 
	$societies = mysql_real_escape_string($_POST['societies']); 
	$regularhaunts = mysql_real_escape_string($_POST['regularhaunts']); 
	$ninjaness = mysql_real_escape_string($_POST['ninjaness']); 
	$address = mysql_real_escape_string($_POST['address']); 
	$kills = 0;
	$status = "Alive";
      
     $checkusername = mysql_query("SELECT * FROM users WHERE Username = '".$username."'");  
       
     if(mysql_num_rows($checkusername) == 1)  
     {  
        echo "<h1>Error</h1>";  
        echo "<p>Sorry, that username is taken. Please go back and try again.</p>";  
     }  
     else  
     {  
        $registerquery = mysql_query("INSERT INTO users (AssassinID, TargetID, Username, Password, FullName, YearGroup, Subject, Societies, RegularHaunts, Ninjaness, Address, Kills, Status) VALUES('".$assassinid."','".$targetid."','".$username."', '".$password."', '".$fullname."', '".$yeargroup."', '".$subject."', '".$societies."', '".$regularhaunts."', '".$ninjaness."', '".$address."', '".$kills."', '".$status."')");  
        if($registerquery)  
        {  
            echo "<h1>Success</h1>";  
            echo "<p>Your account was successfully created. Please <a href=\"index.php\">click here to log in</a>.</p>";  
        }  
        else  
        {  
            echo "<h1>Error</h1>";  
            echo "<p>Sorry, your registration failed. Please go back and try again.</p>";      
        }         
     }  
}  
else  
{  
    ?>  
      <div id="content">
   <h1>Register</h1>  
      
   <p>Please enter your details below to register.</p>  
   
   <form action="register.php" method="post" name="registerform" id="registerform">
     <div class="form_settings">
       <p><span>Exeter Uni Username</span><input type="text" name="username" id="username" value="without the @exeter.ac.uk" /></p>
	   
	   <p><span>Password</span><input type="password" name="password" id="password" value="" /></p>
	   
	   <p><span>Full Name</span><input type="text" name="fullname" id="fullname" value="" /></p>
	   
	   <p><span>Year Group</span><input type="text" name="yeargroup" id="yeargroup" value="" /></p>
	   
	   <p><span>Subject</span><input type="text" name="subject" id="subject" value="" /></p>
	   
	   <p><span>Societies</span><textarea name="societies" id="societies"></textarea></p>
	   
	   <p><span>Regular Haunts</span><textarea name="regularhaunts" id="regularhaunts"></textarea></p>
	   
	   <p><span>Ninjaness /10</span><input type="text" name="ninjaness" id="ninjaness" value="" /></p>
	   
	   <p><span>Exeter Address (not email)</span><input type="text" name="address" id="address" value="" /></p>
	   
       <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="register" id="register" value="Register" /></p>
     </div>
   </form>
   
      
    <?php  
}  
?>  
  
</div>  
</body>  
</html>  
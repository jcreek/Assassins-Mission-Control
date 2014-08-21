<?php include "base.php"; ?> 
<?php
//get the number of rows in the table *THIS WORKS
function GetNumberOfRows() {
	$result = mysql_query( "select count(UserID) as num_rows from users" );
	$row = mysql_fetch_object( $result );
	$total = $row->num_rows;
	return $total;
}
?>
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
		if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']) && $_SESSION['Status']=='Alive')  
		{  
			if (file_exists("upload/".$_SESSION['Username'].'.'.'gif') || file_exists("upload/".$_SESSION['Username'].'.'.'jpeg') || file_exists("upload/".$_SESSION['Username'].'.'.'jpg') || file_exists("upload/".$_SESSION['Username'].'.'.'png')) {
				?>  
				        <div id="sidebar_container">
				            <img class="paperclip" src="style/paperclip.png" alt="paperclip" />
				            <div class="sidebar">
				              <h3>Log Out</h3>
				              <form method="post" action="logout.php" id="logout">
				                <p style="padding: 0 0 0px 0;"></p>
				                <p><input class="subscribe" name="subscribe" type="submit" value="Log Out" /></p>
				              </form>
				            </div>
				          <img class="paperclip" src="style/paperclip.png" alt="paperclip" />
				          <div class="sidebar">
				          <!-- insert your sidebar items here -->
				          <h3>Latest Kills</h3>
				          <p><a class="twitter-timeline" href="https://twitter.com/search?q=%23exeassassins" data-widget-id="441062980285784064">Tweets about "#exeassassins"</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

				</p>
				          </div>
				        </div>
						<div id="content">
				<h1>Your Info</h1>  
				<h2>Players Alive: <b><?=$_SESSION['NumberOfPlayersAlive']?>/<?=$_SESSION['NumberOfPlayers']?></h2>
					<p>Thanks for logging in <b><?=$_SESSION['FullName']?></b>! You are <b><?=$_SESSION['Status']?></b>...</p>
					<ul>
						<?php
							if (file_exists("upload/".$_SESSION['Username'].'.'.'gif')) {
								echo "<li><img src='"."upload/".$_SESSION['Username'].'.'.'gif'."' class=\"targetphoto\"></li>";
							} 
							
							if (file_exists("upload/".$_SESSION['Username'].'.'.'jpeg')) {
								echo "<li><img src='"."upload/".$_SESSION['Username'].'.'.'jpeg'."' class=\"targetphoto\"></li>";
							} 
							
							if (file_exists("upload/".$_SESSION['Username'].'.'.'jpg')) {
								echo "<li><img src='"."upload/".$_SESSION['Username'].'.'.'jpg'."' class=\"targetphoto\"></li>";
							} 
							
							if (file_exists("upload/".$_SESSION['Username'].'.'.'png')) {
								echo "<li><img src='"."upload/".$_SESSION['Username'].'.'.'png'."' class=\"targetphoto\"></li>";
							} 
						?>
						<li>Year Group: <b><?=$_SESSION['YearGroup']?></b></li>
						<li>Email Address: <b><?=$_SESSION['Username']?>@exeter.ac.uk</b></li>
						<li>Subject Studied: <b><?=$_SESSION['Subject']?></b></li>
						<li>Societies: <b><?=$_SESSION['Societies']?></b></li>
						<li>Regular Haunts:  <b><?=$_SESSION['RegularHaunts']?></b></li>
						<li>You live at:  <b><?=$_SESSION['Address']?></b></li>
						<li>Ninjaness Score: <b><?=$_SESSION['Ninjaness']?>/10</b></li>
						<li>You have made <b><?=$_SESSION['Kills']?> kills</b></li>
					</ul> 
					
						<?php  
					}  
					else {
						?>
						<div id="content">
						<h1>Upload Photo</h1>
						<p>Please <a href="uploadphoto.php">click here to add a photo</a>.</p>
						<?php
					}
				}
						
						
				elseif(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']) && $_SESSION['Status']=='Dead')  
				{  
					?>  
					<div id="content">
					<h1>YOU ARE DEAD</h1>
					<h2>Players Alive: <b><?=$_SESSION['NumberOfPlayersAlive']?>/<?=$_SESSION['NumberOfPlayers']?></h2>
						<p>Thanks for logging in <b><?=$_SESSION['FullName']?></b>! </p>
						<ul>
							<li>Year Group: <b><?=$_SESSION['YearGroup']?></b></li>
							<li>Email Address: <b><?=$_SESSION['Username']?>@exeter.ac.uk</b></li>
							<li>Subject Studied: <b><?=$_SESSION['Subject']?></b></li>
							<li>Societies: <b><?=$_SESSION['Societies']?></b></li>
							<li>Regular Haunts:  <b><?=$_SESSION['RegularHaunts']?></b></li>
							<li>You live at:  <b><?=$_SESSION['Address']?></b></li>
							<li>Ninjaness Score: <b><?=$_SESSION['Ninjaness']?>/10</b></li>
							<li>You have made <b><?=$_SESSION['Kills']?> kills</b></li>
							<br>
							<li>You are <b><?=$_SESSION['Status']?></b></li>
						</ul> 
						<p><a href="logout.php">Click here to log out.</a>
							<?php  
						}  
						elseif(!empty($_POST['username']) && !empty($_POST['password']))  
						{  
							$username = mysql_real_escape_string($_POST['username']);  
							$password = md5(mysql_real_escape_string($_POST['password']));  
      
							$checklogin = mysql_query("SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");  
      		  	
							//Get the number of players and send it to a session variable
							$numberofplayers = GetNumberOfRows();
							$_SESSION['NumberOfPlayers'] = $numberofplayers;
				
							//Get the number of players with 'Alive' as their 'Status' and send that to a session variable
							$getplayersalive = mysql_query("SELECT * FROM users WHERE Status = 'Alive'");  
							$numberofplayersalive = mysql_num_rows($getplayersalive);
							$_SESSION['NumberOfPlayersAlive'] = $numberofplayersalive;
	  
							if(mysql_num_rows($checklogin) == 1)  
							{  
								//Set the Assassin's Information
					
								$row = mysql_fetch_array($checklogin);
								$assassinid = $row['AssassinID'];
								$targetid = $row['TargetID'];
								$fullname = $row['FullName']; 
								$yeargroup = $row['YearGroup']; 
								$subject = $row['Subject']; 
								$societies = $row['Societies']; 
								$regularhaunts = $row['RegularHaunts']; 
								$ninjaness = $row['Ninjaness']; 
								$address = $row['Address'];
								$kills = $row['Kills']; 
								$status = $row['Status']; 
					 
          
								$_SESSION['AssassinID'] = $assassinid;
								$_SESSION['TargetID'] = $targetid;
								$_SESSION['Username'] = $username;  
								$_SESSION['FullName'] = $fullname;  
								$_SESSION['YearGroup'] = $yeargroup; 
								$_SESSION['Subject'] = $subject; 
								$_SESSION['Societies'] = $societies; 
								$_SESSION['RegularHaunts'] = $regularhaunts; 
								$_SESSION['Ninjaness'] = $ninjaness; 
								$_SESSION['Address'] = $address; 
								$_SESSION['Kills'] = $kills; 
								$_SESSION['Status'] = $status; 
								$_SESSION['LoggedIn'] = 1;  
					
								//Now set the Target Information
								//Query the database for the user with 'AssassinID'=$targetID and then 
					
								$targetinfo = mysql_query("SELECT * FROM users WHERE AssassinID = '".$targetid."'");  
      
								if(mysql_num_rows($targetinfo) == 1)  
								{  
									//Set the Assassin's Information
					
									$rowt = mysql_fetch_array($targetinfo); //rowt=Row of Target
									$usernamet = $rowt['Username'];
									$assassinidt = $rowt['AssassinID'];
									$targetidt = $rowt['TargetID'];
									$fullnamet = $rowt['FullName']; 
									$yeargroupt = $rowt['YearGroup']; 
									$subjectt = $rowt['Subject']; 
									$societiest = $rowt['Societies']; 
									$regularhauntst = $rowt['RegularHaunts']; 
									$addresst = $rowt['Address'];
									$ninjanesst = $rowt['Ninjaness']; 
									$killst = $rowt['Kills']; 
									$statust = $rowt['Status']; 
					 
          
									$_SESSION['Usernamet'] = $usernamet;
									$_SESSION['AssassinIDt'] = $assassinidt;
									$_SESSION['TargetIDt'] = $targetidt;
									$_SESSION['Usernamet'] = $usernamet;  
									$_SESSION['FullNamet'] = $fullnamet;  
									$_SESSION['YearGroupt'] = $yeargroupt; 
									$_SESSION['Subjectt'] = $subjectt; 
									$_SESSION['Societiest'] = $societiest; 
									$_SESSION['RegularHauntst'] = $regularhauntst;
									$_SESSION['Addresst'] = $addresst;  
									$_SESSION['Ninjanesst'] = $ninjanesst; 
									$_SESSION['Killst'] = $killst; 
									$_SESSION['Statust'] = $statust;  
								}
					
								//Start the HTML stuff
          
								echo "<h1>Success</h1>";  
								echo "<p>We are now redirecting you to the member area.</p>";  
								echo '<meta content="3;index.php" http-equiv="refresh">';  
							}  
							else  
							{  
								echo "<h1>Error</h1>";  
								echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p>";  
							}  
						}  
						else  
						{  
							?>  
      
							<div id="content">
							<h1>Member Login</h1>  
      
							<p>Thanks for visiting! Please either login below, or <a href="register.php">click here to register</a>.</p> 
							
					        <form action="index.php" method="post" name="loginform" id="loginform">
					          <div class="form_settings">
					            <p><span>Username</span><input type="text" name="username" id="username" value="" /></p>
								<p><span>Password</span><input type="password" name="password" id="password" value="" /></p>
					            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="login" id="login" value="Login" /></p>
					          </div>
					        </form> 
      
							<?php  
						}  
						?>  
  
					</div>  
				</body>  
				</html> 
	
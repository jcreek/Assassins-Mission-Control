<?php 
include "base.php"; 
require_once('PHPMailer_v5.1/class.phpmailer.php');
define('EUSER', 'JOSHUACR\\admin'); // EMail username
define('EPWD', '$@!$kw86'); // EMail password
?> 

<script type="text/javascript" src="codebird-js-master/codebird.js"></script>
<?php
function smtpmailer($to, $from, $from_name, $subject, $body) { 
	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled ssl/tls
	$mail->Host = 'ssrs.reachmail.net';
	$mail->Port = 465; 
	$mail->Username = EUSER;  
	$mail->Password = EPWD;           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
}
?>


<?php
$_SESSION['KillDetails'] = mysql_real_escape_string($_POST['killdetails']);
$_killedname = $_SESSION['FullNamet'];
$_killedusername = $_SESSION['Usernamet'];

	//Get the TargetID of the deceased
//$deceasedtargetid = $_SESSION['TargetIDt'];  //mysql_query("SELECT TargetID FROM usersfinal WHERE AssassinID = '".$_SESSION['TargetID']."'");
//echo $_SESSION['TargetIDt'];
//Using that TargetID reset the session variables of the killer's target
mysql_query( "UPDATE usersfinal SET TargetID = '".$_SESSION['TargetIDt']."' WHERE AssassinID = '".$_SESSION['AssassinID']."'" ) ;

//Wipe the TargetID of the deceased
mysql_query( "UPDATE usersfinal SET TargetID = 0 WHERE AssassinID = '".$_SESSION['TargetID']."'" ) ;

//Mark the deceased as 'Dead'
mysql_query( "UPDATE usersfinal SET Status = 'Dead' WHERE AssassinID = '".$_SESSION['TargetID']."'" ) ;
  
//Increment the Killer's Kill field
$newkills = $_SESSION['Kills'] + 1;
$_SESSION['Kills'] = $newkills ;
mysql_query( "UPDATE usersfinal SET Kills = '".$_SESSION['Kills']."' WHERE AssassinID = '".$_SESSION['AssassinID']."'" ) ;


$targetinfo = mysql_query("SELECT * FROM usersfinal WHERE AssassinID = '".$_SESSION['TargetIDt']."'");  
$_SESSION['TargetID'] = $_SESSION['TargetIDt'];


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
	$_SESSION['Ninjanesst'] = $ninjanesst; 
	$_SESSION['Killst'] = $killst; 
	$_SESSION['Statust'] = $statust;  
}
//Get the number of players with 'Alive' as their 'Status' and send that to a session variable
$getplayersalive = mysql_query("SELECT * FROM usersfinal WHERE Status = 'Alive'");  
$numberofplayersalive = mysql_num_rows($getplayersalive);
$_SESSION['NumberOfPlayersAlive'] = $numberofplayersalive;
?>


<!--Send kill details to FB and Twitter (Potentially set up Twitter to feed to Facebook?)-->
<script type="text/javascript">
var killdetails = "#exeassassins <?=$_killedname?> dead: <?php echo $_SESSION['KillDetails'] ?>";

var cb = new Codebird;
cb.setConsumerKey("6UxEQnzDe3rEOQprGpG9A", "87oIWvCpDb4eibJo0HNxB7efz2RI6sBPY94dgVuQX0");
cb.setToken("2344307718-t93VOJ6jvygX6FJthkj77waJb6GyLHLrL3VXkcb", "gOA6RqnopEDNewKx713kKTTi9SrVuk2H0IpdtNfh6j6Th");
cb.__call(
	"statuses_update",
	{"status": killdetails},
	function (reply) {
		// ...
	}
);
</script>


<!--Send kill details via email-->
<?php
//Mail us to confirm the kill
smtpmailer('exeterunihideandseek@gmail.com', 'exeterunihideandseek@gmail.com', 'Hide and Seek Exeter', $_killedname.' ('.$_killedusername.'@exeter.ac.uk'')) has been killed by '.$_SESSION['Username'].'@exeter.ac.uk', $_SESSION['KillDetails']);
//Mail the killer 
smtpmailer($_SESSION['Username'].'@exeter.ac.uk', 'exeterunihideandseek@gmail.com', 'Hide and Seek Exeter', 'You have killed '.$_killedname, $_SESSION['KillDetails']);
//Mail the deceased
smtpmailer($_killedusername.'@exeter.ac.uk', 'exeterunihideandseek@gmail.com', 'Hide and Seek Exeter', 'You, '.$_killedname.' have been killed', $_SESSION['KillDetails']);
	
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
		  <div id="content">

<h1>Kill registered</h1>
<p>Click below to return to the member area.</p>
<!--meta content="3;index.php" http-equiv="refresh"-->
<form method="post" action="index.php" id="home"><p style="padding: 0 0 0px 0;"></p>
				                <p><input class="home" name="home" type="submit" value="Return" /></p>
				              </form>
					</div>  
				</body>  
				</html> 
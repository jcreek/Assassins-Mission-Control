<?php include "../base.php"; 

//random number generator function
function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
	$array = array_slice($numbers, 0, $quantity);
    return $array;
}
//get the number of rows in the table *THIS WORKS
function GetNumberOfRows() {
$result = mysql_query( "select count(UserID) as num_rows from usersfinal" );
$row = mysql_fetch_object( $result );
$total = $row->num_rows;
return $total;
}
//call that stuff to do what I want
$numberofrows = GetNumberOfRows(); //*THIS WORKS
$IDarray = UniqueRandomNumbersWithinRange(1,$numberofrows,$numberofrows);

echo "Here begins the tempIDs output by the for loop:" ;
echo "<br>" ;
//print_r ($IDarray);
for ($counter = 1; $counter <= $numberofrows; $counter += 1) { //*THIS WORKS
	$assassinID = $IDarray[$counter - 1] ; //*THIS WORKS
	if ($assassinID == $numberofrows) {
		$targetID = 1 ;
	}
	else {
		$targetID = $assassinID + 1 ;
	}
	
	echo "a: " ;
		echo $assassinID ;
		echo "<br>" ;
		echo "t: " ;
		echo $targetID ;
		echo "<br>" ;
		
		
		//set tempID as the assassinID of the user in the row $counter
		
		//set tempID+1 as the target ID of the user in the row $counter
		//mysql_query( "NSERT INTO users (AssassinID, TargetID) VALUES ($assassinID, $targetID)" );
		echo "Start AssassinSQL " ;
		//UPDATE Users SET weight = 160, desiredWeight = 145 WHERE id = 1;
		mysql_query( "UPDATE usersfinal SET AssassinID = $assassinID WHERE UserID = $counter" ) ;
		echo $counter ;
			echo "<br>" ;
			echo "Start TargetSQL " ;
			//UPDATE Users SET weight = 160, desiredWeight = 145 WHERE id = 1;
			mysql_query( "UPDATE usersfinal SET TargetID = $targetID WHERE UserID = $counter" ) ;
			echo $counter ;
				echo "<br>" ;
			
			mysql_query( "UPDATE usersfinal SET Status = 'Alive' WHERE UserID = $counter" ) ;
			mysql_query( "UPDATE usersfinal SET Kills = 0 WHERE UserID = $counter" ) ;
			
	}
			
?>


<!--meta content="3;index.php" http-equiv="refresh"-->

<!--
UniqueRandomNumbersWithinRange(1,GetNumberOfRows(),GetNumberOfRows())

For each position in the array: (use i)
	userID i is assigned the contents of the array as assassinID
		targetID is set as as the contents of the array + 1


Then for each position in the array apply the shuffled number at that position to the user at that position in the table as a column 'AssassinID'. 

Then when the game begins just allocate everyone the user with the assassin number after theirs. 

When a user successfully kills a player mark that play as dead, void their target column and change the number in the killer's target column to that which was in the deceased's target column. 


-->
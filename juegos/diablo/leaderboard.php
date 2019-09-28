<form method="post" action="leaderboard.php">
    <input type="text" name="studentname">
    <input type="submit" value="click" name="submit"> <!-- assign a name for the button -->
</form>

<?php
function display()
{
 
 $temporada=$_POST['studentname'];
 $token='USxkNEbdcD6C8WUC3xkhYeiaOfZV7pSdUy';
 $url1="https://us.api.blizzard.com/data/d3/season/".$temporada."/leaderboard/achievement-points?access_token=".$token."";
	
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => $url1,   // Fetch this URL
        CURLOPT_RETURNTRANSFER => true,   // CURL exec returns data into variable
	
    ]);

    $data = curl_exec($ch);
    curl_close($ch);
	
	$l=json_decode($data);
	 if(!ISSET($l )) exit();
	 echo"
	 
	<div class='leaderboard'>
		<table>
		  <tr>
			<th>Rank</th>
			<th>Puntos</th>
			<th>Battletag</th>
			<th>Clase</th>
			<th>Paragon</th>
		</tr>
	 " ;
	 
	$i = 0;
	while ($i < 30)
	{

		$clase=$l->row[$i]->player[0]->data[2]->string;
		$id=$l->row[$i]->player[0]->data[0]->string;
		$rank=$l->row[$i]->data[0]->number;
		$points=$l->row[$i]->data[1]->number;
		$paragon=$l->row[$i]->player[0]->data[5]->number;

	  echo" 
	  <tr>
		<th>$rank</th>
		<th>$points</th>
		<th>$id</th>
		<th>$clase</th>
		<th>$paragon</th>
	</tr>";
	  $i++;
	} 
	
}

if(isset($_POST['submit']))
{
   display();
   
   
} 

 
 ?>
 </table>
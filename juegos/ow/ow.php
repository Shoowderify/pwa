<!DOCTYPE html>
<html>
  <head>
  
    <meta charset="utf-8">
    <title>Overwatch</title>
  	<link rel="stylesheet" type="text/css" href="./assets/style.css">
	<link type="text/css" href="./assets/font/big_noodle_titling_oblique.ttf">
	<link rel="stylesheet" type="text/css" href="../../header.css">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">


 </head>
<body>

<div class='container'>
 <?php
	$title='ow';
	include "../../header.php";
	?>
 <?php 
//	include "include/style.php";
	echo"


	
";

				 $recibo= trim($_POST['name']);
				$nombre=str_replace(' ', '%20', $recibo);
				$region=$_POST['region'];
				$tag=$_POST['tag'];
				
				//si no hay respuesta:
				/*$request = json_decode(file_get_contents("https://$region.api.riotgames.com/lol/summoner/v4/summoners/by-name/$nombre?api_key=".$api_key));
				if( !$request )
				header("Location: ./form.php");
*/	 $data = json_decode(file_get_contents("https://ow-api.com/v1/stats/pc/$region/$nombre-$tag/profile"));
	// $data = json_decode(file_get_contents("https://$region.api.riotgames.com/lol/summoner/v4/summoners/by-name/$nombre?api_key=".$api_key));
     //$datac = json_decode(file_get_contents("https://$region.api.riotgames.com/lol/league/v4/positions/by-summoner/$data->id?api_key=".$api_key));
if(ISSET($data->quickPlayStats->games->won ))
$qpwon=($data->quickPlayStats->games->won);
if(ISSET($data->competitiveStats->games->played)){
$comp=($data->competitiveStats->games);
$medals=$data->competitiveStats->awards;
$medalsq=$data->quickPlayStats->awards;
}

		
if(!ISSET($data->name)){header("Location: ./index.php");}
	echo"
	<div class='perfil'>
		<div class='nombre'>
			<img src='$data->icon' style='float:left' width='100px'><h1> $data->name </h1>
		</div>

	";
		echo"
		<div class='nivel'>
			<h1>Nivel <br>",$data->level+($data->prestige*100);
			//echo"<br><br>prestigio: $data->prestige<br>";
			echo"
			<br>
			<img src='$data->prestigeIcon' width='100px'>
		</div>
	
		<div class='nivel'>
			<h1>Victorias <br> $data->gamesWon<br></h1>
			
		</div>
	</div>";

if(ISSET($qpwon)&&($comp->played)){
echo"
		<div class='stats'>";
		 $bronze=$medalsq->medalsBronze;
			 $silver=$medalsq->medalsSilver;
			 $gold=$medalsq->medalsGold;
if(ISSET($data->quickPlayStats->games->won ))
		echo"	<div class='quickplay'>
				<div class='general'>
				<h1>Quickplay</h1>
					<h2>victorias:<br>$qpwon <br></h2>	
					<br>
				</div>
					<div class='medals'>
				<h1>Medallas </h1>
				<div class='medallas' style='color:rgb(177, 113, 15)'>

					<h2 >Bronce: $bronze </h2>	
				</div>
				<div class='medallas'style='color:grey'>
				
					<h2>Plata: $silver </h2>	
				</div>
				
				<div class='medallas'style='color:yellow'>
			
					<h2>Oro: $gold</h2>				
				</div>
				</div>
			</div>";
			 
			 
			 
		if(ISSET($comp->played)){
			$bronze=$medals->medalsBronze;
			 $silver=$medals->medalsSilver;
			 $gold=$medals->medalsGold;
		echo"
			<div class='competitive'>
				<div class='general'>
				<h1>competitivo</h1>
				<h2>jugadas: $comp->played </h2>		
				<h2>victorias: $comp->won <br></h2>	
				</div>
				<div class='medals'>

				<h1>Medallas </h1>
				<div class='medallas'style='color:rgb(177, 113, 15)'>

					<h2>Bronce: $bronze <br></h2>	
				</div>
				<div class='medallas'style='color:grey'>
					<h2>Plata: $silver <br></h2>	
				</div>
				<div class='medallas'style='color:yellow'>
					<h2>Oro: $gold <br></h2>
					
				</div>
				</div>				
			</div>
		</div>
		";}

	
		

}

	if($data->private=='true')
			echo" <div class='privado'>Perfil Privado</div>";
		?>




</div>	
<?php include "../../scripts.php"?>
</body>
</html>

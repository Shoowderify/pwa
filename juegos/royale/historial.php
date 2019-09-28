<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="icon" type="image/png" href="./assets/icons/icon.png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="./assets/style.css">	
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

		<link rel="stylesheet" type="text/css" href="../../header.css">

	</head>

  <body>
  <div class="container">
    <div class="juegos">
   <?php
  $title='clash';
	include "../../header.php";
	?>
   <?php 
   
   include ('./token.php');
   
     if(isset($_GET['tag']) )
  {
    $tag=$_GET['tag'];
	$url="https://api.clashroyale.com/v1/players/%23".$tag."/battlelog";	
  }
   

	$ch = curl_init($url); 
// Configuring curl options 
    $options = array( 
            CURLOPT_RETURNTRANSFER => true,     
            CURLOPT_HTTPHEADER => array('Content-type: application/json'), 
            CURLOPT_HTTPHEADER => array('accept: application/json'), 
            CURLOPT_HTTPHEADER => array('authorization: Bearer '.$token.''), 
    ); 
    // Setting curl options 
    curl_setopt_array( $ch, $options );     
    // Getting results 
    $response = curl_exec($ch); // Getting jSON result string   
    // Cerrar el recurso cURL y liberar recursos del sistema 
    curl_close($ch);   

    $historial = json_decode($response);   
	

	
	

	echo"
	<div class='historial'>
	
	";
	$i = 0;
$arrayLength = count($historial);

	while ($i < 10)
		{
			if(!isset($historial[$i]->type))
				break;
			$tipo=$historial[$i]->type;
			
			$time=$historial[$i]->battleTime;
			$año=(substr( $time, 0, 4 ));
			$mes=(substr( $time, 4, 2 ));
			$dia=(substr( $time, 6, 2 ));
			
		
			
			$team=$historial[$i]->team;
			$opponent=$historial[$i]->opponent;
		if($tipo=='clanWarCollectionDay')
			$tipo='Guerra de Clanes - Dia de recoleccion';	
		if($tipo == 'friendly')
			$tipo = 'Amistoso';
		
			echo"
			<div class='partidas'>

				$tipo
				<br>
				 $dia/$mes/$año
				<br>
				<div class='vs'>vs</div>
		
			
		";

			
				$cards=$team[0]->cards;
				$name=$team[0]->name;
				$cards=$team[0]->cards;
				$tag=$team[0]->tag;
				$tag=substr($tag,1);
				//$rey=$team[0]->kingTowerHitPoints;
				$crowns=$team[0]->crowns;
				
			echo"
			<div class='team'> 
			<a href='./clash.php?tag=$tag'>$name</a><br>
			<div class='team1'>
			
			";
				$x = 0;
			//	$arrayLength = count($cards);
					while ($x < 8)
		{
		
			$carta=$cards[$x]->name;
			$cardsicon=$cards[$x]->iconUrls->medium;
			echo"
				<div class='carta'>
					<img src='$cardsicon' height=50px>
			</div>
				
			";
			$x++;
		}	
		echo"</div>";
		
		
		
			if(isset($team[1]->name))
			{
				
				$cards=$team[1]->cards;
				$name=$team[1]->name;
				$tag=$team[1]->tag;
				$tag=substr($tag,1);
				$cards=$team[1]->cards;
				echo"	<div class='team2'> 
				<a href='./clash.php?tag=$tag'>$name</a><br>";
				$x = 0;
			//	$arrayLength = count($cards);
					while ($x < 8)
		{
		
			$carta=$cards[$x]->name;
			$cardsicon=$cards[$x]->iconUrls->medium;
			echo"
				<div class='carta'>
					<img src='$cardsicon' height=50px>
			</div>
				
			";
			$x++;
		}	
		echo"	</div>
	
		
		";
			}
		echo"</div>
		
	
	
		";
		//OPONENTE
		{
				$cards=$opponent[0]->cards;
				$name=$opponent[0]->name;
				$cards=$opponent[0]->cards;
				$tag=$opponent[0]->tag;
				$tag=substr($tag,1);
				$crownsoponente=$opponent[0]->crowns;
				if( $crownsoponente < $crowns)				
				{
					$resultadoteam = 'Victoria';
					$resultadooponente = 'Derrota';
					$colorteam= 'blue';
					$coloroponente= '#981a1a';
				}
				if( $crownsoponente > $crowns)
					{
					$resultadoteam = 'Derrota <br>';
					$resultadooponente = 'Victoria';
					$colorteam= '#981a1a';
					$coloroponente= 'blue';
					}
				if( $crownsoponente == $crowns)
					{
					$resultadoteam = 'Empate';
					$resultadooponente = 'Empate';
					$colorteam= '#ff730c';
					$coloroponente= '#ff730c';
					}
			
			echo"
				<div class='teamstats'>
			<div class='teamstat' style='color:$colorteam'>
			$resultadoteam<br><br><img src='./assets/icons/crown-blue.png' height=20px>$crowns 
			</div>
			
				<div class='oponentestat' style='color:$coloroponente'>
				$resultadooponente	<br><br><img src='./assets/icons/crown-red.png' height=20px>$crownsoponente 
				</div>
		</div>
			<div class='oponente'> 
			<a href='./clash.php?tag=$tag'>$name</a><br>
		
			<div class='oponente1'>
			
			";
				$x = 0;
			//	$arrayLength = count($cards);
					while ($x < 8)
		{
		
			$carta=$cards[$x]->name;
			$cardsicon=$cards[$x]->iconUrls->medium;
			echo"
				<div class='carta'>
					<img src='$cardsicon' height=50px>
				</div>
				
			";
			$x++;
		}	
		echo"
		
		</div>
		
		
		";
			
		}
			if(isset($opponent[1]->name))
			{
				
				$cards=$opponent[1]->cards;
				$name=$opponent[1]->name;
				$cards=$opponent[1]->cards;
				$tag=$opponent[1]->tag;
				$tag=substr($tag,1);
			
			echo"
		
			<a href='./clash.php?tag=$tag'>$name</a><br>
			
			<div class='oponente1'>
			
			";
				$x = 0;
			//	$arrayLength = count($cards);
					while ($x < 8)
		{
		
			$carta=$cards[$x]->name;
			$cardsicon=$cards[$x]->iconUrls->medium;
			echo"
				<div class='carta'>
					<img src='$cardsicon' height=50px>
				</div>
				
			";
			$x++;
		}	
		echo"</div>";
			}
		
		echo"
	
			</div>";
			
			$i++;
		

		
echo"	



	</div>

	";
	
		}

  ?>
  
  </div>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script src="../../menu.js"></script>
   <script src="../../header.js"></script>
      <script src="../../botonscroll.js"></script>
  </body>
</html>

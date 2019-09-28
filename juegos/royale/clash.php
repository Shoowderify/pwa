

<!DOCTYPE html>
<html>
  <head>
  <link rel="icon" type="image/png" href="./assets/icons/icon.png" sizes="16x16">
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" type="text/css" href="../../header.css">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta charset="utf-8">
   
	<link rel="stylesheet" type="text/css" href="./assets/style.css">
	  <script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

	 
 </head>

  <body>
  <div class="container">

   <?php
  $title='clash';
	include "../../header.php";
	?>
  <?php 

include ('./token.php');

if(isset($_POST['tag']) )
{
	 $tag=$_POST['tag'];
		if(substr( $tag, 0, 1 ) === "#")
		$tag=(substr( $tag,1 ));
		$tag=(strtoupper($tag));
	$url="https://api.clashroyale.com/v1/players/%23".$tag."";
}

  if(isset($_GET['tag']) )
  {
    $tag=$_GET['tag'];
		if(substr( $tag, 0, 1 ) === "#")
		$tag=(substr( $tag,1 ));
		$tag=(strtoupper($tag));
	$url="https://api.clashroyale.com/v1/players/%23".$tag."";
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

    $data = json_decode($response);   
	
	 if(!ISSET($data->name )){header("Location: ./index.php");}
	 
	$url="https://api.clashroyale.com/v1/players/%23".$tag."/upcomingchests";
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

    $chests = json_decode($response);   
	
	 
	 echo " <title>$data->name</title>";
		$arena=$data->arena->name;	
 if(isset($data->clan) )
	{
	$clan=$data->clan;
	$cname=$clan->name;
	$clanTag=$clan->tag;
	$xd=$data->clan->tag;
	$xd=substr($xd,1);
	}
$wins=$data->wins;
$losses=$data->losses;
$challenge=$data->challengeMaxWins;
$cartasganadas=$data->challengeCardsWon;
$nivel=$data->expLevel;

$torneobatallas=$data->tournamentBattleCount;
$torneocartas=$data->tournamentCardsWon;

	//FAVORITO 
	if(isset($data->currentFavouriteCard)){
		$favorite=$data->currentFavouriteCard;
		$fav=$favorite->name;
		$favlevel=$favorite->maxLevel;
		$favicon=$favorite->iconUrls->medium;
	}
	//CARDS
	$cards=$data->cards;

   // print_r($data); 
  echo"
   <script type='text/javascript'>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Estadistica', 'Numero'],
          ['Victorias',     $wins],
          ['Derrotas',     $losses],
        ]);

        var options = {
          pieHole: 0.5,
        pieSliceText: 'none',
		  backgroundColor: { fill:'transparent' },
          legend: {position: 'top', textStyle: {color: 'white', fontSize: 10}}
        };

        var chart = new google.visualization.PieChart(document.getElementById('donut_single'));
        chart.draw(data, options);
      }
    </script>
  ";
  

  
	echo"
	
	
	   <div class='content'>
	<div class='perfil'>

				<center><h1>$data->name <span class='userlevel'>$nivel</span></h1></center>

		<div class='info'>
			<br>Tag: $data->tag<br>
			";
			if(isset($data->clan) )
			{
			echo"
			<br>Clan: <a href='./clanes.php?clan=$xd'>$cname</a> <br>
			";
			}
			echo"
			<br>Nivel: $nivel<br>
			<br> <img src='./assets/icons/trophy.png' height=30px>$data->trophies /$data->bestTrophies<br>
			<div class='mostrarhistorial'><br><a href='./historial.php?tag=$tag'>Historial</a> <br></div>
		</div>
		
		<div class='win'>
			<br>Victoria de 3 coronas: $data->threeCrownWins
			<br>Victorias: $wins
			<br>Derrota: $losses
			<div id='donut_single' style='width: 200px; height: 200px;padding-left:50px;'></div>

		</div>
		
		<div class='arena'>
			<br><div class='arena-text'>$arena</div> <img src='./assets/arena/$arena.png' class='image-arena'>
		</div>
		
	</div>

	<div class='cofres'>
	<h1>Cofres</h1>
	";

	
	$i = 0;
$arrayLength = count($chests->items);

	while ($i < $arrayLength)
		{
		$chest=$chests->items[$i]->name;
		$cofre=$chests->items[$i]->index;
		$cofre=$cofre+1;
			echo"
			<div class='cofre'>
				
				<br>+$cofre<br> <img src='./assets/chest/$chest.png' height=70px>
			</div>	
			";
			
				
		
		$i++;
		}
		
		echo "</div>";
echo"
	

	<div class='cartas'>
		<br>
			<button class='accordion'><h1>Cartas</h1></button>
<div class='panel'>

	
		";
//aqui 

//sort($cards,SORT_ASC);
array_multisort( array_column($cards, "maxLevel"), SORT_DESC, $cards );

$clength = count($cards);
for($x = 0; $x < $clength; $x++) {
	$cardsicon=$cards[$x]->iconUrls->medium;
	$cardslevel=$cards[$x]->level;
   echo"
   <div class='todas'>
				<img src='$cardsicon' height=100px>
				<br>
				Nivel:$cardslevel
			<br><br>
			</div>	

   
   ";

  // echo $cards[$x]->name;

	}
	echo  "</div>";
	if(isset($data->currentFavouriteCard)){
   echo"
  
	<div class='favorita'>
			<h1>Carta Favorita</h1>
			<br>
			<img src='$favicon' height=100px>
			<br>
		</div>	";}
		echo"
   			<div class='mazo'>
			<h1>Mazo Actual</h1>
   
	";
	$actual=$data->currentDeck;
$clength = count($actual);

for($x = 0; $x < $clength; $x++) {
	$actualicon=$actual[$x]->iconUrls->medium;
	$actuallevel=$actual[$x]->level;
	
		echo"
		<div class='cartamazo'>

			<br>
			<img src='$actualicon' height=100px>
			<br>
			 Nivel:$actuallevel
		</div>
		

		" ;
		
	}
		echo"
		</div>	
	
	</div>	
	
	
	
";

$challengemax=$data->challengeMaxWins;
$challengewon=$data->challengeCardsWon;
$coleccionadas=$data->clanCardsCollected;
$donaciones=$data->totalDonations;
		echo"
		<div class='estadisticas'>
			<h1>Estadisticas</h1>
			<div class='batalla'>
				<h1>Batallas <img src='./assets/icons/battle.png' height=40px style='float:right'></h1>
				
				 <br>Victoras: $wins
				  <br>Derrotas: $losses
				  <br>Cartas coleccionadas: $coleccionadas
				  <br>Donaciones: $donaciones
			</div>
			
			
			<div class='challenge'>
				
				
				<h2>Desafios <img src='./assets/icons/challenges.png' height=40px style='float:right'></h2>
				<br>
				Victoras maximas:$challengemax
				<br>
				Victorias: $challengewon
				<hr>
				<h2>Torneo <img src='./assets/icons/tournament.png' height=40px style='float:right'></h2>			

				<br>Batallas:$torneobatallas
				<br>Cartas ganadas: $torneocartas
			
			</div>
		</div>
	
	
 <script>
var acc = document.getElementsByClassName('accordion');
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener('click', function() {
    this.classList.toggle('active');
    var panel = this.nextElementSibling;
    if (panel.style.display === 'block') {
      panel.style.display = 'none';
    } else {
      panel.style.display = 'block';
    }
  });
}
</script>
		";

      	?>
		
 </div>
</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
   <script src="../../menu.js"></script>
   <script src="../../header.js"></script>
      <script src="../../botonscroll.js"></script>
  </body>
</html>

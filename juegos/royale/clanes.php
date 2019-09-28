<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" type="image/png" href="./assets/icons/clan.png" sizes="16x16">
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<link rel="stylesheet" type="text/css" href="./assets/style.css">	 
		<link rel="stylesheet" type="text/css" href="../../header.css">
				<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">


		<meta charset="utf-8">	
	</head>

	<body>
	<div class="container">
   <?php
  $title='clash';
	include "../../header.php";
	?>
  <?php
  
  include ('./token.php');
  
if(isset($_POST['clan']) )
{
	$clan=$_POST['clan'];
		if(substr( $clan, 0, 1 ) === "#")
		$clan=(substr( $clan,1 ));
	$url="https://api.clashroyale.com/v1/clans/%23".$clan."";	
}

  if(isset($_GET['clan']) )
  {
    $clan=$_GET['clan'];
		if(substr( $clan, 0, 1 ) === "#")
		$clan=(substr( $clan,1 ));
	$url="https://api.clashroyale.com/v1/clans/%23".$clan."";	
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

  $name=$data->name;
  $description=$data->description;
  $clanScore=$data->clanScore;
  $clanWarTrophies=$data->clanWarTrophies;
  $location=$data->location;
  $country=$location->name;
  if($location->isCountry == 'True')
	$code=strtolower($location->countryCode);
	else
	$code=strtolower($location->name);
  $badgeId=$data->badgeId;
  $memberList=$data->memberList;
  
  if($clanWarTrophies >= 0)
	  $liga='bronze1';
  if($clanWarTrophies >= 200)
	  $liga='breonze2';
  if($clanWarTrophies >= 400)
	  $liga='bronze3';
  
  if($clanWarTrophies >= 600)
	  $liga='silver1';
   if($clanWarTrophies >= 900)
	  $liga='silver2';
   if($clanWarTrophies >= 1200)
	  $liga='silver3';
  
   if($clanWarTrophies >= 1500)
	  $liga='gold1';
   if($clanWarTrophies >= 2000)
	  $liga='gold2';
   if($clanWarTrophies >= 2500)
	  $liga='gold3';
  
	if($clanWarTrophies >= 3000)
	  $liga='magical';
  
  
  
	  
  	 echo " <title>$data->name</title>";
	 echo"
	 <div class='clan'>
		";
			if($code=='international'){
				$code='_int';
				echo"
				<h1><img src='https://cdn.statsroyale.com/images/clanwars/".$badgeId."_".$liga.".png' height=50px> $data->name<img src='https://royaleapi.com/static/img/flags/".$code.".svg' height=50px> </h1>
				";}
				else {
					echo"
						<h1><img src='https://cdn.statsroyale.com/images/clanwars/".$badgeId."_".$liga.".png' height=50px> $data->name<img src='https://royaleapi.com/static/img/flags2/".$code.".png' height=50px> </h1>
				
					";}
		echo"
		<div class='info'>
			<br>$description<br>
			
			<br>
			<div class='trofeo'>
				<img src='./assets/icons/trophy.png' height=30px> $data->clanScore
				</div>
			<div class='trofeo'>
			 <img src='./assets/icons/trophycw.png' height=30px>$clanWarTrophies<br> <br>
				</div>
		
		
		
	</div>
	 
	 ";
	 
	 echo" <div class='clan'>
	 <div class='rank'>Rank</div>
			<div class='nombre'>nombre</div>
			<div class='nivel'>nivel</div>
			<div class='liga'>liga</div>
			<div class='trofeos'>trofeos</div>
			<div class='donaciones'>donaciones</div> 
			<div class='rol'>rol</div>
			<br><br>
			</div>
			
			";
	$i = 0;
	
$arrayLength = count($memberList);

	while ($i < $arrayLength)
		{
			$miembros=$data->memberList[$i]->name;
			$trofeosm=$data->memberList[$i]->trophies;
			$rank=$data->memberList[$i]->clanRank;
			$nivel=$data->memberList[$i]->expLevel;
			$liga=$data->memberList[$i]->arena->name;
			$donaciones=$data->memberList[$i]->donationsReceived;
			$rol=$data->memberList[$i]->role;
			$tag=$data->memberList[$i]->tag;
			 $tag=substr($tag,1);
				//$liga=str_replace("Legendary Arena","arena13","$liga");
				$rol=str_replace("member","Miembro","$rol");
				$rol=str_replace("coLeader","CoLider","$rol");
				$rol=str_replace("elder","Veterano","$rol");
				$rol=str_replace("leader","Lider","$rol");
				
				if(substr( $liga, 0, 5 ) === "Arena")
					$liga="Liga0";
				
			  echo"
			   <div class='miembros'>
			<div class='rank'>$rank</div>
			<div class='nombre'><a href='./clash.php?tag=$tag'>$miembros</a></div>
			<div class='nivel'><span class='userlevel'>$nivel</span></div>
			
			<div class='liga'><img src='./assets/arena/$liga.png' height=30px></div>
			
			<div class='trofeos'>$trofeosm</div>
			<div class='donaciones'>$donaciones</div> 
			<div class='rol'>$rol</div>
			
			</div>
			  
			  ";

			
			
			$i++;
		}
  
  
  ?>
	</div>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
   <script src="../../menu.js"></script>
   <script src="../../header.js"></script>
      <script src="../../botonscroll.js"></script>
	</body>
</html>

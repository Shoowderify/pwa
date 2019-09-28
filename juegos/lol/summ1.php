<!DOCTYPE HTML>
<html>
		<head>
			<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="../../header.css">
			<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		</head>
		<div class='container'>
			<div class='juegos'>
		<?php
			$title='lol';
			include "../../header.php";

	include "include/style.php";
	include "nombres.php";
	echo"
	
	
	  <div id='resultados' class='resultados'>
";
	 if (!empty($_POST)){
			  $api_key = "RGAPI-e3bbfa95-17cc-4439-8977-a1d2da71f04e";
			  
				$recibo= trim($_POST['sumonnerName']);
				$nombre=str_replace(' ', '%20', $recibo);
				$region=$_POST['region'];
				
				//si no hay respuesta:
				$request = json_decode(file_get_contents("https://$region.api.riotgames.com/lol/summoner/v4/summoners/by-name/$nombre?api_key=".$api_key));
				if( !$request )
				header("Location: ./index.php");
				set_time_limit(0);
	$data = json_decode(file_get_contents("https://$region.api.riotgames.com/lol/summoner/v4/summoners/by-name/$nombre?api_key=".$api_key));
	$datac= json_decode(file_get_contents("https://$region.api.riotgames.com/lol/league/v4/entries/by-summoner/".$data->id."?api_key=".$api_key));
	 $data2 = json_decode(file_get_contents("http://ddragon.leagueoflegends.com/cdn/9.10.1/data/en_US/champion.json"));
	
	 $url="https://$region.api.riotgames.com/lol/champion-mastery/v4/champion-masteries/by-summoner/".$data->id."?api_key=".$api_key;
	 $ul="https://$region.api.riotgames.com/lol/champion-mastery/v4/scores/by-summoner/".$data->id."?api_key=".$api_key; 
	 $data6 = json_decode(file_get_contents("https://$region.api.riotgames.com/lol/match/v4/matchlists/by-account/".$data->accountId."?api_key=".$api_key));
	$f=0;
	 do{
		$juego[$f]=$data6->matches[$f];
		$id123=$juego[$f]->gameId;
		$data5[$f] = json_decode(file_get_contents("https://$region.api.riotgames.com/lol/match/v4/matches/".$id123."?api_key=".$api_key));
	$f++;
	}while($f<3);

	 $ch = curl_init();
     curl_setopt_array($ch,[
         CURLOPT_URL => $url,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data3=curl_exec($ch);
    curl_close($ch);

    $ch1 = curl_init();
     curl_setopt_array($ch1,[
         CURLOPT_URL => $ul,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data1=curl_exec($ch1);
    curl_close($ch1);

    $e=json_decode($data3);
		$t=json_decode($data1);
		

	 echo"<body>";
	 echo" <div id='main'> ";
	 echo"<div id='main1'>";
	 echo"<h2>
	     <form class='' action='./summ1.php' method='post'>
        <label for=''>nombre de invocador</label>
        <input type='text' name='sumonnerName' value=''>
		region
		<select name='region'>
		  <option value='LA2'>LAS</option>
		  <option value='LA1'>LAN</option>
		  <option value='NA1'>NA</option>
		  <option value='BR1'>BR</option>
		  <option value='RU'>RUSIA</option>
		  <option value='KR'>KOREA</option>
		  <option value='EUW1'>EUW</option>
		</select>
        <input type='submit' name='' value='Buscar'>
      </form>";
	 echo"</div>";
		
		echo"<div id='main2'>";
		
		
		echo"<div id='imagen'>
		<img style='float:left; margin-top:3px; margin-left:5px; margin-right:10px;' 
		src='https://ddragon.leagueoflegends.com/cdn/9.13.1/img/profileicon/$data->profileIconId.png' width='140px' align:'right'>
		</div>";
		echo"<h2><br><br>nombre: $data->name<br>";
		echo"nivel: $data->summonerLevel<br>";
		//echo"$data->id<br>";
		
		echo"</div>";

		if(ISSET($datac[0]->tier) || ISSET($datac[1]->tier))
		{ 
		
			if((ISSET($datac[1]->tier) && $datac[1]->queueType=='RANKED_SOLO_5x5')|| (ISSET($datac[0]->tier) && $datac[0]->queueType=='RANKED_FLEX_SR')) 		
		 {
			 if(ISSET($datac[1]->tier)){
		echo"<div id='main5'>";
		echo"<h2>Solo:",$datac[1]->tier;
		echo"/ division :",$datac[1]->rank;
		echo"<br> PUNTOS:",$datac[1]->leaguePoints;
		echo"<br> partidas ganadas: ", $datac[1]->wins;
		echo"<br> partidas perdidas: ", $datac[1]->losses;
		$suma=round($datac[1]->wins + $datac[1]->losses,1);
		echo"<br> ratio de victorias: ",round($datac[1]->wins/$suma*100)."%";
		echo"<center>";
		echo"<div id='imagen'>
		<img src='./base-icons/".$datac[1]->tier.".png' width='100px' align:'center'>
		</div>";	
		echo"</center>";
		echo"<br> ";
			echo"</div>";
			 
		}
		if(ISSET($datac[0]->tier)){
		echo"<div id='main5'>";
		echo"<h2>Flex:",$datac[0]->tier; 
		echo"/ division :",$datac[0]->rank;
		echo"<br> PUNTOS :",$datac[0]->leaguePoints;
		echo"<br> partidas ganadas: ", $datac[0]->wins;
		echo"<br> partidas perdidas: ", $datac[0]->losses;
		$suma=round($datac[0]->wins + $datac[0]->losses,1);
		echo"<br> ratio de victorias: ",round($datac[0]->wins/$suma*100)."%";
		echo"<center>";
		echo"
		<img src='./base-icons/".$datac[0]->tier.".png' width='100px' align:'center'>
		";
		echo"</center>";
		 echo"<br>";
		echo"</div>";
	}
	}else{

		if(ISSET($datac[0]->tier)){
			echo"<div id='main5'>";
			echo"<h2>Solo:",$datac[0]->tier;
			echo"/ division :",$datac[0]->rank;
			echo"<br> PUNTOS:",$datac[0]->leaguePoints;
			echo"<br> partidas ganadas: ", $datac[0]->wins;
			echo"<br> partidas perdidas: ", $datac[0]->losses;
			$suma=round($datac[0]->wins + $datac[0]->losses,1);
			echo"<br> ratio de victorias: ",round($datac[0]->wins/$suma*100)."%";
			echo"<center>";
			echo"<div id='imagen'>
			<img src='./base-icons/".$datac[0]->tier.".png' width='100px' align:'center'>
			</div>";	
			echo"</center>";
			echo"<br> ";
				echo"</div>";
				 
			}
			if(ISSET($datac[1]->tier)){
			echo"<div id='main5'>";
			echo"<h2>Flex:",$datac[1]->tier; 
			echo"/ division :",$datac[1]->rank;
			echo"<br> PUNTOS :",$datac[1]->leaguePoints;
			echo"<br> partidas ganadas: ", $datac[1]->wins;
			echo"<br> partidas perdidas: ", $datac[1]->losses;
			$suma=round($datac[1]->wins + $datac[1]->losses,1);
			echo"<br> ratio de victorias: ",round($datac[1]->wins/$suma*100)."%";
			echo"<center>";
			echo"
			<img src='./base-icons/".$datac[1]->tier.".png' width='100px' align:'center'>
			";
			echo"</center>";
			 echo"<br>";
			echo"</div>";	

	}	
}
	}

		  
	
		echo"</div>";
		echo"<h2>ultimas 3 partidas<br><br></h2>";
		$i=0;
		$bat=$data6->matches;
    do{
		echo"<div id='main7'> <h2>";
		$team=$data5[$i]->teams;
		$equipo=$data5[$i]->participants;
		$mach1=$bat[$i];
		
		$tiempo1=$data5[$i]->gameDuration;
		$tiempo1=$tiempo1/60;
		$tiempo2=floor($tiempo1);
		$tiempo3= fmod($tiempo1,$tiempo2);
		$tiempo3=$tiempo3*60;
		

		$re1 = ChIDToName($mach1->champion); 
		echo"$re1<br>";
		$re1=str_replace('\'','',$re1);//("buscar","reemplazar",$string) 
		$re1=str_replace(' ','',$re1);
		$re1=str_replace('.','',$re1);
		$re1=str_replace('NunuyWillump','Nunu',$re1);
		echo"<img style='float:left; margin-top:3px; margin-left:5px; margin-right:10px; margin-bottom:10px'  
    	src='http://ddragon.leagueoflegends.com/cdn/9.10.1/img/champion/$re1.png' width='130px' align:'right'>";
	
		echo"tiempo de partida: $tiempo2:";
		if($tiempo3<=10)
		{
			$tiempo3=floor($tiempo3);
		echo"0$tiempo3<br>";
		}
		else
		{
			echo"$tiempo3<br>";
		}
		$f=0;
		do
		{
			if($mach1->champion==$equipo[$f]->championId)
			{
				$stat=$equipo[$f]->stats;
				echo"Nivel de campeon: $stat->champLevel<br>";
				echo"Minion asesinados: $stat->totalMinionsKilled<br>";
				echo"puntuacion de vision: $stat->visionScore<br>";
				echo"torretas destruidas: $stat->turretKills<br>";
				echo"K/D/A<br>";
				echo"$stat->kills/";
				echo"$stat->deaths/";
				echo"$stat->assists<br><br><br><br>";
				break;
			}
		$f++;
		}while($f<10);

		
		$i++;
		echo"</div>";
	}while($i<3);

		$i=0;
		echo"<center><h2>nivel de maestria total: $t<br><br>";
    while($i<3)
    {
    if(ISSET($e[$i]->championId))
    {   
        $campeon=$e[$i]->championId;
         $level=$e[$i]->championLevel;
         $puntos=$e[$i]->championPoints;
         $jugado=$e[$i]->lastPlayTime;
         $siguiente=$e[$i]->championPointsSinceLastLevel;
         $proximo=$e[$i]->championPointsUntilNextLevel;
    


	$re = ChIDToName($campeon); 
	    
		//de aqui en adelante van los div
		echo"<div id='main6'";
		echo"<h2>
		<center> $re<br> 
		nivel: $level <br>
		puntos Totales: $puntos <br>";
    $re=str_replace('\'','',$re);//("buscar","reemplazar",$string) 
    $re=str_replace(' ','',$re);
    $re=str_replace('.','',$re);
    $re=str_replace('NunuyWillump','Nunu',$re);
    
    echo"
    <img style=' margin-top:3px; margin-left:10px; margin-right:10px;' 
    src='http://ddragon.leagueoflegends.com/cdn/9.10.1/img/champion/$re.png' width='140px' align:'center'>
		<br>diferencia con el nivel anterior: $siguiente <br>";
		
		
	

	  if($proximo!=0)
    {
        echo"para el proximo nivel $proximo <br>";
		}
    $i++;
		}	
	
		echo"</div>";
}

	//hasta aca van los div 
/*?>
	<footer>
   </footer>
     <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script src="menu.js"></script>
   <script src="header.js"></script>
      <script src="botonscroll.js"></script>
	<?php*/
	
		include"../../scripts.php";

	echo"</body>";
}
		?>
</html>
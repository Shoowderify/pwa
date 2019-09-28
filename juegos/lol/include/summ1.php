  <?php 
	include "include/style.php";
	echo"
	</div>
	
	  <div id='resultados' class='resultados'>
";
	 if (!empty($_POST)){
		         $api_key = "RGAPI-d192d2c1-831c-49fa-bb9f-e96aac8b8cc1";

	 $data = json_decode(file_get_contents("https://la2.api.riotgames.com/lol/summoner/v4/summoners/by-name/".$_POST['sumonnerName']."?api_key=".$api_key));
     $datac = json_decode(file_get_contents("https://la2.api.riotgames.com/lol/league/v4/positions/by-summoner/$data->id?api_key=".$api_key));
//var_dump(isset($datac[0]->tier));

		/* 	$c=$datac[0]->tier;
			$w=$datac[0]->wins;
		$c1=$datac[1]->tier;
			$w1=$datac[1]->wins;
			
	
	
	
	aqui debe ir el css*/
		
	echo" <div id='main'>";
		

		echo" nombre: $data->name<br>";
        echo"nivel: $data->summonerLevel<br>";
		echo"<div id='imagen'>
		<img src='https://ddragon.leagueoflegends.com/cdn/9.6.1/img/profileicon/$data->profileIconId.png' width='100px' align:left>
		</div>";
		 echo"$data->id<br>";
		//echo"nivel: $data->id<br>";
;
		
		
		
	
		//echo":<img src='https://ddragon.leagueoflegends.com/cdn/9.6.1/img/profileicon/$data->profileIconId.png' width='100px'> ";

	
		
		 if(ISSET($datac[0]->tier)){
echo"SOLO:",$datac[0]->tier;
			echo"/ division :",$datac[0]->rank;
		echo"/ PUNTOS :",$datac[0]->leaguePoints;
		echo"/ liga :",$datac[0]->leagueName;
		$suma=round($datac[0]->wins / $datac[0]->losses,1);
		echo"/ ratio de w/l: $suma";
		 echo"<br>";

}

if(ISSET($datac[1]->tier)){
		 		echo"FLEX:",$datac[1]->tier;
		echo"/ division :",$datac[1]->rank;
		echo"/ PUNTOS:",$datac[1]->leaguePoints;
			echo"/ liga :",$datac[1]->leagueName;
			$suma=round($datac[1]->wins / $datac[1]->losses,1);
		echo"/ ratio de w/l: $suma";
		 echo"<br>";
	
}		
		
	
	
	}
	
	echo"</div>";
		?>
	


<style>
.bosses { overflow: auto; }
.bosses .boss { text-align: center; width: 120px; background:url(./icons/bosses.png) no-repeat; float: left; padding-top: 135px;}
.bosses .boss0 { background-position:  0     0;}
.bosses .boss1 { background-position: -120px 0;}
.bosses .boss2 { background-position: -240px 0;}
.bosses .boss3 { background-position: -360px 0;}
.bosses .boss4 { background-position: -480px 0;}
.bosses .boss0killed { background-position:  0     -130px;}
.bosses .boss1killed { background-position: -120px -130px;}
.bosses .boss2killed { background-position: -240px -130px;}
.bosses .boss3killed { background-position: -360px -130px;}
.bosses .boss4killed { background-position: -480px -130px;}

.pagina-artesanos {float:left;}
.artisan { display:block; float:left; padding:8px 0 0 65px; width:229px; height:90px; background:url(./icons/career-artisans.jpg) no-repeat; }
.artisan.jeweler-locked,
.artisan.mystic-locked,
.artisan.blacksmith-locked { background-position:-882px 0; }
.artisan.blacksmith,
.artisan.jeweler,
.artisan.blacksmith-locked,
.artisan.jeweler-locked { margin-right: 9px; }
.artisan.jeweler { background-position:-294px 0; }
.artisan.mystic { background-position:-588px 0; }
.artisan .title { display:block; color:#ad835a; font-size:18px; line-height:1.5em; margin-top:7px; margin-bottom:1px; }
.artisan .level { display:block; color:#a99877; font-size:12px;  }
.artisan .level.hardcore { color:#b10000; }
.artisan .level .value { font-weight: bold; }


</style>
  <?php 

$url="https://us.api.blizzard.com/d3/profile/Shoowderify-1233/?locale=en_US&access_token=USee0uoBeFCU4hLdhs9TZi5MN8YxSbAhL7";
//$url="https://us.api.blizzard.com/d3/profile/Benshep-1505/?locale=en_US&access_token=USee0uoBeFCU4hLdhs9TZi5MN8YxSbAhL7";

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => $url,   // Fetch this URL
        CURLOPT_RETURNTRANSFER => true,   // CURL exec returns data into variable
    ]);

    $data = curl_exec($ch);
    curl_close($ch);
	
	$e=json_decode($data);
	
	$heroes=$e->heroes[0];
	$monster=$e->kills;
	$mystic=$e->mystic;
	$jeweler=$e->jeweler;
	$blacksmith=$e->blacksmith;
	$acto=$e->progression;
	
	echo"$e->battleTag <br>";
	echo"Muertes de monstruos: $monster->monsters <br>";
	echo"Muertes de elites: $monster->elites <br>";
	echo"Paragon: $e->paragonLevel <br>";
	echo"Paragon de temporada: $e->paragonLevelSeason <br>";
	echo"<br>";

	echo"Nivel Mystica: $mystic->level <br>";
	echo"Nivel jeweler: $jeweler->level <br>";
	echo"Nivel blacksmith: $blacksmith->level <br>";

	

//echo"<img src='https://vignette.wikia.nocookie.net/diablo/images/4/41/Barbarian-Fury-Resource.gif/revision/latest?cb=20110923205658'>";

echo"<br>Lista de heroes<br>";
$i = 0;
$arrayLength = count($e->heroes);


        while ($i < $arrayLength)
        {
			
			$dx=$e->heroes[$i];
			$muertes=($dx->kills)->elites;
			$season=($dx->seasonal);
			$hardcore=($dx->hardcore);
			
			echo"<img src='./icons/".$dx->class."_".$dx->gender.".png'> ";
			echo "Nombre: ".$dx->name ." / clase: ";
			echo "$dx->class ";
			echo " nivel:$dx->level ";
			echo "Muertes de elites: $muertes ";
			echo "Paragon: $dx->paragonLevel ";
				if ($hardcore=="false")
					echo"<font size='3' color='red'>Extremo</font> ";
				if ($season=="false")
				echo"<img src='./icons/season.png' width='20px'> <br /> ";
				else
					echo"<br /> ";
            $i++;
        }

		echo"
		
			<div class='bosses'>
				";
			if ($acto->act1=="false"){
			echo"<div class='boss boss0killed'></div>";
			}
			else
				echo"<div class='boss boss0'></div>";
			
		if ($acto->act2=="false"){
			echo"<div class='boss boss1killed'></div>";
			}
			else
				echo"<div class='boss boss1'></div>";
			
	if ($acto->act3=="false"){
			echo"<div class='boss boss2killed'></div>";
			}
			else
				echo"<div class='boss boss2'></div>";
			
	if ($acto->act4=="false"){
			echo"<div class='boss boss3killed'></div>";
			}
			else
				echo"<div class='boss boss3'></div>";
			
	if ($acto->act5=="false"){
			echo"
				<div class='boss boss4killed'></div>";
			}
			else
				echo"<div class='boss boss4'></div>";	
		
echo"
		
			</div>
				";
		
		
		echo"
			<div  class='pagina-artesanos'  >
			<div>
				

	<h3>Artesanos</h3>


			</div>

		<div>




		<div class='artisan blacksmith'>
			<span class='title'>Herrero</span>
			<span class='level normal'>Nivel <span class='value'>$blacksmith->level</span> (Normal)</span>
			</div>





		<div class='artisan jeweler'>
			<span class='title'>Orfebre</span>
			<span class='level normal'>Nivel <span class='value'>$jeweler->level</span> (Normal)</span>
			</div>





		<div class='artisan mystic'>
			<span class='title'>Mística</span>
			<span class='level normal'>Nivel <span class='value'>$mystic->level</span> (Normal)</span>
			</div>
<span class='clear'><!-- --></span>
		</div>
	</div>
	
		";
	 //$data = json_decode(file_get_contents("https://us.api.blizzard.com/d3/profile/Shoowderify-1233/?locale=en_US&access_token=USee0uoBeFCU4hLdhs9TZi5MN8YxSbAhL7"));
	//$context = stream_context_create(array('https' => array('header'=>'Connection: close\r\n')));
//file_get_contents("https://us.api.blizzard.com/d3/profile/Shoowderify-1233/?locale=en_US&access_token=USee0uoBeFCU4hLdhs9TZi5MN8YxSbAhL7",false,$context);



	?>



<!DOCTYPE html>
<html>
  <head>
  
    <meta charset="utf-8">
    <title>Diablo 3</title>
	<link rel="stylesheet" type="text/css" href="./assets/font/stylesheet.css">
	<link rel="stylesheet" type="text/css" href="./assets/style.css">
	<link rel="stylesheet" type="text/css" href="./assets/font/Palatino Linotype.ttf">
	<link rel="stylesheet" type="text/css" href="../../header.css">
	<link rel='icon' type='image/png' href='../../assets/img/diablo3.png' sizes='16x16'>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

 </head>

  <body>
  <div class="container">
   <?php
	$title='diablo3';
	include "../../header.php";
	?>
  <?php 

	$id=$_POST['id'];
	$battletag=$_POST['battletag'];
	$region=$_POST['region'];
	$token='USRWkDIy5lJPSg95TEj52u8W2JJvRvNwkb';
	$url="https://".$region.".api.blizzard.com/d3/profile/".$id."-".$battletag."/?locale=en_US&access_token=".$token."";
	//$url="https://us.api.blizzard.com/d3/profile/Benshep-1505/?locale=en_US&access_token=USxdLRpkHogHR6hCnr72Z6raW8J8m6zQzM";

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
	if (isset($e->mystic->level))
		$mystic=$e->mystic;
	if (isset($e->jeweler->level))
		$jeweler=$e->jeweler;
	if (isset($e->blacksmith->level))
		$blacksmith=$e->blacksmith->level;
	$acto=$e->progression;
	 if(!ISSET($e->battleTag )){header("Location: ./index.php");}
	echo"
	<div class='perfil'>
		<h3>PERFIL</h3>
		<h1> $e->battleTag </h1><br>
		<div class='kills'>
			<p>Muertes de monstruos: $monster->monsters </p>
			<img src='./assets/icons/kills.png' style='height:100%' align='middle'> 
		</div>

		<div class='elites'>
			<p>Muertes de elites:<br> $monster->elites </p>
			<img src='./assets/icons/elites.png' style='height:100%' align='middle'> 
		</div>
		
		<div class='paragon'>
			<p>Paragon: $e->paragonLevel</p><br>
			<img src='./assets/icons/paragon.png' style='height:100%' align='middle'> <br>
		</div>
		<br> 
	</div>";


	

//echo"<img src='https://vignette.wikia.nocookie.net/diablo/images/4/41/Barbarian-Fury-Resource.gif/revision/latest?cb=20110923205658'>";

echo"
	<div class='textHeroes' >
		<h3><br>Lista de heroes<br></h3>
	</div>
	<div class='divi' >
	</div><br>
			";
$i = 0;
$arrayLength = count($e->heroes);

echo"<div class='heroes'>";
			while ($i < $arrayLength)
			{
			
			$dx=$e->heroes[$i];
			$muertes=($dx->kills)->elites;
			$season=($dx->seasonal);
			$hardcore=($dx->hardcore);
			$level= $dx->level;
			
			 
			if ($hardcore=="false")
				echo" <div class='heroeExtremo'>";
			else 
				echo" <div class='heroe'>";
				echo" 
			<img src='./assets/icons/".$dx->class."_".$dx->gender.".png' align='middle'  > 
			<br>";
			if ($hardcore=="false")
					echo"<br><font size='3' color='red'>Extremo</font> <br>";
			echo"Nombre: ".$dx->name ." 
			<br>Clase: $dx->class 
			<br> nivel: $level 
			<br>Muertes de elites: $muertes 
			<br>Paragon: $dx->paragonLevel ";
				
				
				if ($season=="false")
				echo"<img src='./assets/icons/season.png' width='20px'> <br /> ";
				
				echo"</div>";
            $i++;
			
        }
echo"</div>";
		echo"
		<br>
		<div class='divi' >
			</div>
			<br>
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
		
			<div  class='pagina-artesanos'>
				<div class='textArtesanos'>
					<h3>Artesanos</h3>
				</div>
			<div>




		<div class='artisan blacksmith'>
			<span class='title'>Herrero</span>
			";
			if (isset($e->blacksmith->level))
				echo"<span class='level normal'>Nivel <span class='value'>$blacksmith</span> (Normal)</span>";
			else
				echo"<span class='level normal'>Nivel <span class='value'>0</span> (Normal)</span>";
			
			echo";
		</div>

		<div class='artisan jeweler'>
		<span class='title'>Orfebre</span>";
		
				if (isset($e->jeweler->level))
					echo"<span class='level normal'>Nivel <span class='value'>$jeweler->level</span> (Normal)</span>";
				else
					echo"<span class='level normal'>Nivel <span class='value'>0</span> (Normal)</span>";
			echo";
		</div>

		<div class='artisan mystic'>
		<span class='title'>Mística</span>
		";
		if (isset($e->mystic->level))
			echo"<span class='level normal'>Nivel <span class='value'>$mystic->level</span> (Normal)</span>";
		else
			echo"<span class='level normal'>Nivel <span class='value'>0</span> (Normal)</span>";
		echo"
		</div>
<span class='clear'><!-- --></span>
		</div>
	</div>
	
		";
      	?>

</div>
  <?php include "../../scripts.php"?>

</body>

</html>

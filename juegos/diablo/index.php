<!DOCTYPE html>
<html>
  <head> 
   <title>Diablo 3</title>
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
	<div class="formulario">
		<h1>Buscar Perfil</h1>
		<form class='form' action='./diablo3.php' method='post'>
			<label for=''>Nombre</label>
			<input type='text' name='id' value='Shoowderify'>
			<label for=''>#</label>
			<input type='text' name='battletag' value='1233'>
			<br><br>
			<label for=''>Region:</label>
			<select name='region'>
			  <option value="us">NorteAmerica</option>
			  <option value="EU">Europa</option>
			  <option value="KR">corea</option>
			</select>
			<input type='submit' name='buscar' value='Buscar'>
		</form>
	</div>
	<br>
	<div class="formulario clasificacion" >
		<h2>Clasificacion de Temporada</h2>
		(Puntos de logro)
		<form class='form' method="post" action="index.php">
			Temporada(1-16): <input type="text" name="temporada" value="1">
			<input type="submit" name="buscar" value="Buscar"> 
		</form>
	</div>
	<br>
	<?php
	function display()
	{
	 
	 $temporada=$_POST['temporada'];
	 $token='USRWkDIy5lJPSg95TEj52u8W2JJvRvNwkb';
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
			<h2>Temporada $temporada</h2>
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

			if((isset($_POST['temporada'])) && $_POST['temporada'] > 0 && $_POST['temporada'] < 17 )
			{
			   display(); 
			} 
	?>
				</table>

		</div>	
  
  </div>
    <?php include "../../scripts.php"?>

  </body>
</html>
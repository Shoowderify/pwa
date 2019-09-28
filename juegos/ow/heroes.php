<!DOCTYPE html>
<html>
  <head>
  
    <meta charset="utf-8">
    <title>Lolein</title>

  	<link rel="stylesheet" type="text/css" href="./assets/style.css">
	<link type="text/css" href="./assets/font/big_noodle_titling_oblique.ttf">

	</head>
  
  <body>
<a href="destino.php?saludo=hola&texto=Esto es una variable texto">
	<div class='container'>
	 <?php 

	$heroe=$_POST['heroe'];
	$region=$_POST['region'];
	 $data = json_decode(file_get_contents("https://ow-api.com/v1/stats/pc/$region/$nombre-$tag/heroes/$heroe"));

		?>				
	</div>
  </body>
</html>
<!DOCTYPE html>
<html>
  <head>
  
    <meta charset="utf-8">
    <title>Overwatch</title>

  	<link rel="stylesheet" type="text/css" href="./assets/style.css">
	<link rel="stylesheet" type="text/css" href="../../header.css">
	<link rel='icon' type='image/png' href='../../assets/img/ow.png' sizes='16x16'>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

	</head>
  
  <body>
		<div class='container'>
		 <?php
	$title='ow';
	include "../../header.php";

	?>
		
		
		<div class="formulario">
			<form class='form' action='./ow.php' method='post'>
					<label for='name'>Nombre</label>
					<input type='text' name='name' value='Shoowderify'>
					<label for='tag'>#</label>					
					<input type='text' name='tag' value='1233'>
					<br><br>
					<label for="region">Region</label>
					<select name='region'>
						<option value="us">US</option>
						<option value="eu">EU</option>
						<option value="asia">ASIA</option>
					</select>
					
					<input type='submit' name='buscar' value='Buscar'>
			</form>
		
	</div>
</div>
  <?php include "../../scripts.php"?>

  </body>
</html>

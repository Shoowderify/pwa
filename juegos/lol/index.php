<!DOCTYPE html>
<html>

  	<head>
			<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="../../header.css">
			<link rel="stylesheet" href="estilo.css"/>
			<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		</head>
  
  
 <body>
	<div class='container'>
		<?php
			$title='lol';
			include "../../header.php";

	include "include/style.php";
	include "nombres.php";
	?>


		<div id="todo" class="todo">
			<div id="form" class="form">
			
			<img class="imagen" src="j.jpg" style="padding: 2px 2px 0 2px; height: 100px; width:130px;"/>
			<div class="caja" style="margin: 0 30px 0 30px; text-align:justify;">
			<form class='' action='./summ1.php' method='post'>
					<label for='sumonnerName'>Nombre</label>
					<input type='text' name='sumonnerName' value='Plugo'>
					<label for="region">Region</label><br/>
					<select name='region'>
						<option value="LA2">LAS</option>
						<option value="LA1">LAN</option>
						<option value="NA1">NA</option>
						<option value="BR1">BR</option>
						<option value="RU">RUSIA</option>
						<option value="KR">KOREA</option>
						<option value="EUW1">EUW</option>
					</select>
					<br>
					<input type='submit' id="buscador" name='buscador' value='Buscar'>
				</form>
		</div>
			</div>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
   <script src="../../menu.js"></script>
   <script src="../../header.js"></script>
      <script src="../../botonscroll.js"></script>
	  
  </body>
</html>
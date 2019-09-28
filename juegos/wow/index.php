<!DOCTYPE html>
<html>
  <head>
		<title> titulo </title>
    <meta charset="utf-8">
	<?php
	echo"<style>";
	include "style.css";
	echo"</style>";
	?>
	<link rel="stylesheet" type="text/css" href="../../header.css">

  </head>
  
	<body>
		<div class="container">
		 <?php
	$title='wow';
	include "../../header.php";
	?>
		<section class="todo">
        <div class="container1">
  
				<a href="wow.php" ><h1>Jefes del <br>wow</h1></a>
						 <img src="foto1.png" height="320px">
  
  
        </div>
        <div class="container2">
				<a href="acordeon.php" > <h1>Talentos de los personajes de wow</h1> </a>
            <img src="foto2.png" height="320px">
        </div>
    </section>	
	 </div>
	   <?php include "../../scripts.php"?>

	</body>
</html>
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  
	<body>
	<nav class="navbar navbar-expand-lg bg-secondary fixed-top" >
        <header>
            <a class="navbar-brand" style="text-decoration: none;" href="../index.php">
            <img src="../img/fond.png" style="height:100px; width:100px; float:left; border-radius:50px;" class="d-inline-block align-top" alt="Logo"> 
            <span style="font-size:30px; color:white;"><b>Api Key<br> Games</b></span></a>
        </header>
        <div class="navbar-nav mr-auto ml-auto pt-1 text-center text-uppercase">
            <a class="nav-item nav-link active" href="../index.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Features</a>
            <a class="nav-item nav-link" href="#">Pricing</a>
            <a class="nav-item nav-link disabled" href="#">Disabled</a>
        </div>
    </nav>
		<section class="mx-5" style="margin-top:150px;">
        <div class="container1">
  
				<a href="wow.php" ><h1>Jefes del <br>wow</h1></a>
						 <img src="foto1.png" height="320px">
  
  
        </div>
        <div class="container2">
				<a href="acordeon.php" > <h1>Talentos de los personajes de wow</h1> </a>
            <img src="foto2.png" height="320px">
        </div>
    </section>	
	</body>
</html>
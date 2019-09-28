<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
		<link rel="stylesheet" type="text/css" href="../../header.css">
    
    <style>
        input{
            border: 0px;
            width:20%;
            height: 2em;
        }
		input[type=text]{  border: 0px;
            width:90%;
            height: 2em;}
    </style>
    

    <script type="text/javascript" src="starcraft.js"></script>
</head>
   
<body style="background-image:url('img/fond0.jpg'); background-size:cover; ">
<div class="container" style='    max-width: 1024px;
    height: auto;
    margin: auto;
    background-color: rgba(0, 0, 0, 0.18);
    border-radius: 25px;'>
    <?php
	$title='sc';
	include "../../header.php";
	?>
	
    <section class="todo" style="margin-top:50px; margin-left:25%; background:white;color:white; font-size:30px; display:inline-block; width:50%; min-height:755px; max-height:1500px; border-radius:15%; background-color:rgb(000,0,0); opacity:0.6; ">
        <div id="main" class="container-fluid" style="margin-top:28px; ">
            <img src="img/Logo-starcraft2.png" alt="" style="width:90%; heigth:20px;">
            <form id="form" action="" onsubmit="return false;">
                <h1>¿Qué desea ver?</h1>
                <p style="font-size:18px; text-align:justify; margin: 15px;">Aquí puede realizar consultas con respecto al videojuego "Stracraft II".</p>
                <input type="radio" name="opcion" value="Recompensas" id="recompensas" style="text-align:left;">
                <span>Recompensas</span><br>
                <input type="radio" name="opcion" value="Logros" id="logros" style="text-align:left;">
                <span>logros</span><br>
                <input type="radio" name="opcion" value="Usuario" id="usuario" style="text-align:left;">
                <span>Información de Usuario</span><br>
                <input type="radio" name="opcion" value="ladder" id="ladder" style="text-align:left;">
                <span>Jugador del Raking</span><br>
            </form>
        </div>
    </section>
    
    </div>
	  <?php include "../../scripts.php"?>

</body>
</html>
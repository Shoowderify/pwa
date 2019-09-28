<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  
      <?php
	  

		
  if (!empty($_POST)){
    try {
        $api_key = "RGAPI-d192d2c1-831c-49fa-bb9f-e96aac8b8cc1";
        $data = json_decode(file_get_contents("https://la2.api.riotgames.com/lol/league/v4/positions/by-summoner/".$_POST['sumonnerID']."?api_key=".$api_key));
		
        echo" nombre:";
        
        echo"$data->queueType,<br>";
        echo" <br>";
		echo"victorias: <br>";
		echo"derrotas: <br>";
		echo"tier: <br>";

		echo" <form class='' action='./xd.php' method='post'>
        <label for=''>Nombre</label>
        <input type='text' name='sumonnerName' value=''>
        <input type='submit' name='' value='Buscar'>
      </form>";


    

    } catch (Exception $e) {
    }
	
  }else{ ?>
  
      <form class="" action="./apilol.php" method="post">
        <label for="">Nombre</label>
        <input type="text" name="sumonnerID" value="">
        <input type="submit" name="" value="Buscar">
      </form>

    <?php } ?>
  </body>
</html>
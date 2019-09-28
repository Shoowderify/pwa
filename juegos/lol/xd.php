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
        $data = json_decode(file_get_contents("https://la2.api.riotgames.com/lol/summoner/v4/summoners/by-name/".$_POST['sumonnerName']."?api_key=".$api_key));        echo" nombre: $data->name<br>";
		$id=$data->id;
		$data1 = json_decode(file_get_contents("https://la2.api.riotgames.com/lol/league/v4/positions/by-summoner/".$id."?api_key=".$api_key));
		
		echo"nivel: $data->summonerLevel<br>";
		echo":<img src='https://ddragon.leagueoflegends.com/cdn/9.6.1/img/profileicon/$data->profileIconId.png' width='100px'> <br>";
		echo"id: $data->id<br>";
		echo"victorias: $data1->wins<br>";
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
  
      <form class="" action="./xd.php" method="post">
        <label for="">Nombre</label>
        <input type="text" name="sumonnerName" value="">
        <input type="submit" name="" value="Buscar">
      </form>

    <?php } ?>
  </body>
</html>
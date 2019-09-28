<?php 

set_time_limit(0);

    $url="https://us.api.blizzard.com/wow/boss/?locale=en_US&access_token=USYAyD4EkskcbXvoJz1qsTqjxk31Z3jZ5H";
     $ch = curl_init();
     curl_setopt_array($ch,[
         CURLOPT_URL => $url,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data=curl_exec($ch);
    curl_close($ch);

    $e=json_decode($data);

//$holi=($e->bosses[0]);


	

	$i = 0;
	
$arrayLength = count($e->bosses);


        while ($i < $arrayLength)
        {
			      $dx=$e->bosses[$i];
            $muertes=$dx->name;
            $season=($dx->level);
            $hardcore=($dx->health);
			
			    echo"boss: $muertes";
        echo"<br>nivel: $season";
        echo"<br>vida: $hardcore";
			

            $i++;
        }
        ?>
		

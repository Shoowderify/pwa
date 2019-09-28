<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<?php
include "include/style1.php";
set_time_limit(0);
	$i=1;
	while ($i < 13  )
	{
	
	$url[$i]="https://us.api.blizzard.com/data/wow/playable-class/".$i."?namespace=static-us&locale=es_es&access_token=USo0ork8iMfE5pY53sjgfOJGHJ6RksdTw5";
     $ch[$i] = curl_init();
     curl_setopt_array($ch[$i],[
         CURLOPT_URL => $url[$i],
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data[$i]=curl_exec($ch[$i]);
    curl_close($ch[$i]);

    $e[$i]=json_decode($data[$i]);
	
	echo"<script> 
	$(document).ready(function(){"; 
	
    echo"$('#alternar".$i."').toggle( 

        // Primer click
         function(e){ 
        $('#respuesta".$i."').slideDown();
		 $(this).text('mas informacion');
            e.preventDefault();
       },"; // Separamos las dos funciones con una coma
      
        // Segundo click
        echo"function(e){
         
		$('#respuesta".$i."').slideUp();

            $(this).text('(Mostrar mas informacion');
            e.preventDefault();
        }
  
		);";

	echo"});
	</script>";
	
	
			$jefes=$e[$i]->name;
			$poder=$e[$i]->specializations;
			
			$poder1=$poder[0]->name;
			$poder2=$poder[1]->name;
		
	echo"<body>";
	echo"<center><div class='imagene'>
		<h2>$jefes<br>
		<img src='iconos/".$jefes.".png'> <br>";
		echo"<a href='#' id='alternar".$i."'> alternar</a><br> ";
		echo"<div id='respuesta".$i."'style='display:none'>";
		echo" Talentos<br>";
		echo"<img src='talentos/".$jefes."_".$poder1.".jpg'>";
		echo"$poder1";
		echo"||| <img src='talentos/".$jefes."_".$poder2.".jpg'>";
		echo"$poder2";
		if(ISSET($poder[2]->name)){
			$poder3=$poder[2]->name;
			echo" <img src='talentos/".$jefes."_".$poder3.".jpg'>";
			echo"|||$poder3";
		}
		if(ISSET($poder[3]->name)){
			$poder4=$poder[3]->name;
			echo"|||<img src='talentos/".$jefes."_".$poder4.".jpg'>";
			echo"$poder3";
		}
		echo"</div>";
		echo"</center>"; 
		
	echo"</div>";
		$i++;
	}
	echo"</body>";
        

?>
<html>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

  <?php
	
	include "include/style.php";	
  	set_time_limit(0);
	echo"<h2>";
    $url="https://us.api.blizzard.com/wow/boss/?locale=es_US&access_token=USHquLkZDKKJZJdE7CRer4xB0FHURYMKnd";
     $ch = curl_init();
     curl_setopt_array($ch,[
         CURLOPT_URL => $url,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data=curl_exec($ch);
    curl_close($ch);

    $e=json_decode($data);
	

	$arrayLength = count($e->bosses);

	$s=0;
	echo"<script>";
	echo"$(document).ready(function(){"; 

	while ($s < $arrayLength  )
	{
	
    echo"$('#alternar".$s."').toggle( ";

        // Primer click
        echo" function(e){"; 
        echo" $('#respuesta".$s."').slideDown();";
		echo" $(this).text('(Menos informacion');";
        echo"    e.preventDefault();";
        echo"},"; // Separamos las dos funciones con una coma
      
        // Segundo click
        echo"function(e){"; 
         
		echo"$('#respuesta".$s."').slideUp();";

         echo"   $(this).text('(Mostrar mas informacion');";
            echo"e.preventDefault();";
        echo"}";
  
    echo");";

   $s++;
   }

	echo"});";
echo"</script>";
	echo"<body>";
		$i = 0;
        while ($i < $arrayLength  )
        {
			
            $dx=$e->bosses[$i];
            $jefes=$dx->name;
            $normal=($dx->level);
            $vida=($dx->health);
			$heroic=($dx->heroicLevel);
			$vidahero=($dx->heroicHealth);
			if(ISSET($dx->description))
			{
				$historia=($dx->description);
			}
		echo"<p>";
		echo"Jefes: $jefes";
		echo"<a href='#' id='alternar".$i."'>(Mostrar mas informacion</a>)";
		
		echo"<div id='respuesta".$i."'style='display:none'>";
		echo"nivel Normal: $normal";
        echo"<br>vida: $vida";
		if($dx->heroicLevel==0){

			
			 
		}else
		{
			echo"<br>nivel Heroico: $heroic";
			echo"<br>Vida Heroico: $vidahero";
		}
			echo "<br>descripcion <br> $historia";
		
	echo"</div>";
            $i++;
        }
		//echo"<br>descripcion: ",$holi->description;
		/*$holi=($e->bosses[1]);
		
		echo"boss: ",$holi->name;
		echo"<br>nivel: ",$holi->level;
		echo"<br>vida: ",$holi->health;
		echo"<br>descripcion: ",$holi->description;
		*/
		
		echo"</h2>";
?>

</body>
</html>
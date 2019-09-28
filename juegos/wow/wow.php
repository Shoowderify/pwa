<html>
<head> 
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../header.css">


<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
</head> 
  <?php
	
	include "include/style.php";

  	set_time_limit(0);
	echo"<h2>";
    $url="https://us.api.blizzard.com/wow/boss/?locale=es_US&access_token=USRWkDIy5lJPSg95TEj52u8W2JJvRvNwkb";
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
	echo"<script>
	$(document).ready(function(){"; 

	while ($s < $arrayLength  )
	{
	
    echo"$('#alternar".$s."').toggle( 

        // Primer click
         function(e){ 
        $('#respuesta".$s."').slideDown();
		 $(this).text('(Menos informacion');
            e.preventDefault();
       },"; // Separamos las dos funciones con una coma
      
        // Segundo click
        echo"function(e){
         
		$('#respuesta".$s."').slideUp();

            $(this).text('(Mostrar mas informacion');
            e.preventDefault();
        }
  
		);";

   $s++;
   }

	echo"});
	</script>";
	echo"<body>";
	echo"<div class='container'>";
	$title='wow';
		include "../../header.php";	
	echo"<div class='heroes'>";

	echo"<center><b>jefes</center></b>";
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
		echo" <div class='heroe'>
		<br>$jefes";
		echo"<a href='#' id='alternar".$i."'>  (Mostrar talentos</a>)<br>";
		
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
		echo"</div>";
            $i++;
        }
		echo"</div>";
		//echo"<br>descripcion: ",$holi->description;
		/*$holi=($e->bosses[1]);
		
		echo"boss: ",$holi->name;
		echo"<br>nivel: ",$holi->level;
		echo"<br>vida: ",$holi->health;
		echo"<br>descripcion: ",$holi->description;
		*/
		echo"</h2>";
		echo"</div>";
?>
<?php include "../../scripts.php"?>
</body>
</html>
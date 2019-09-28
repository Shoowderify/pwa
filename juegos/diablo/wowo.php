<?php

    include "include/style.php";
      set_time_limit(0);
    echo"<h2>";
    $url="https://us.api.blizzard.com/wow/boss/?locale=es_US&access_token=USKjXPxo5teQ0ZpE2tqi6IZDr4rALDJZ5k";
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
<html>
<head>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="../../header.css">
<?php
  echo"<style>";
    include "wowstyle.css";
	
  echo"</style>";
?>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
</head>


<?php

	
set_time_limit(0);
  $i=1;

	while ($i < 13  )
	{
	
	$url[$i]="https://us.api.blizzard.com/data/wow/playable-class/".$i."?namespace=static-us&locale=es_es&access_token=USRWkDIy5lJPSg95TEj52u8W2JJvRvNwkb";
     $ch[$i] = curl_init();
     curl_setopt_array($ch[$i],[
         CURLOPT_URL => $url[$i],
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data[$i]=curl_exec($ch[$i]);
    curl_close($ch[$i]);

    $e[$i]=json_decode($data[$i]);
    $i++;    
  }
?> 
 <body><?php
 echo"<div class='container'>";
   $title='wow';
		include "../../header.php";
		?>
  <ul>
<?php
  $s=1;
  while($s < 13)
  {
    
    
   $jefes=$e[$s]->name;
    $poder=$e[$s]->specializations;
    $poder1=$poder[0]->name;
    $poder2=$poder[1]->name;
    


  
 
   echo" <li>
     <!-- Using radio inputs means only one can be selected at a time-->
    <!-- The ID must be unique so the label will point to the input-->
     <input id='rad".$s."' type='radio' name='rad' checked='checked'/>
     <label for='rad".$s."'>
       <div>".$jefes."</div>
     </label>
     <div class='accslide'>
       <div class='content'>
        
         <center><img src='iconos/".$jefes.".png' height='60px'> 
         ".$jefes." </center> <br>
        
         <p><div class='menu1'>";
          echo"<div class='menu2'>";
           echo"<img src='talentos/".$jefes."_".$poder1.".jpg'>";
           echo"$poder1 <br>";
           echo"<img src='talentos1/".$jefes."_".$poder1.".jpg';  height='160px'>";
          echo"</div>";
          echo"<div class='menu2'>";
          echo" <img src='talentos/".$jefes."_".$poder2.".jpg'>";
           echo"$poder2 <br>";
           echo"<img src='talentos1/".$jefes."_".$poder2.".jpg';  height='160px'>";
          echo"</div>";
          if(ISSET($poder[2]->name)){
            $poder3=$poder[2]->name;
            echo"<div class='menu2'>"; 
              echo" <img src='talentos/".$jefes."_".$poder3.".jpg'>";
              echo"$poder3<br>";
              echo"<img src='talentos1/".$jefes."_".$poder3.".jpg';  height='160px'>";
            echo"</div>";
         }
           if(ISSET($poder[3]->name)){
             $poder4=$poder[3]->name;
            echo"<div class='menu2'>"; 
              echo"<img src='talentos/".$jefes."_".$poder4.".jpg'>";
              echo"$poder4 <br>";
              //de aqui comienza
              
              echo"<img src='talentos1/".$jefes."_".$poder4.".jpg'; height='160px'; cursor:zoom-in'
              onclick='document.getElementById('modal01).style.display='block''>";

              echo"<div id='modal01' class='w3-modal' onclick='this.style.display='none''>";
              echo"<span class='w3-button w3-hover-red w3-xlarge w3-display-topright'>&times;</span>";
    
              echo"<div class='w3-modal-content w3-animate-zoom'>";
              echo"  <img src='talentos1/".$jefes."_".$poder4.".jpg' style='width:100%'>";
              echo"</div>";
             echo"</div>"; 
            //aqui termina



            echo"</div>";
         }
         echo"
        </div>


         </p>
       </div>
     </div>
   </li>
  
   ";
   $s++;
} 

?>
</ul>
</div>

</body>
</html>
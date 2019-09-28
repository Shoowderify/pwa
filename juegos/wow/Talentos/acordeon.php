<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> 
<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<?php
  echo"<style>";
    include "wowstyle.css";
  echo"</style>";
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
    $i++;    
  }
?> 
 <body>
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
         <h1> 
         <img src='iconos/".$jefes.".png'> 
         ".$jefes."  <br>
         </h1>
         <p>";
         
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
         echo"



         </p>
       </div>
     </div>
   </li>
  
   ";
   $s++;
} 

?>
</ul>


</body>
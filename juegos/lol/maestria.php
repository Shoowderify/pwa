<?php
include "nombres.php";


    set_time_limit(0);
    echo"<h2>";
    $token="RGAPI-6a6a0c44-b026-4e8f-bb88-28e05027c022";
   // $id1="upuDrZ_77X6u3MOdXPXkhGaya_2Qv6aw4MbpIUdNL0TA2w";//benshep
    //$id1="mKpfKvYVS63QddfO_k2f5Uo1PG5fmIkG98_dgWH1DMlOUw";//truppers
   // $id1="QcRtwyYFYoxe3r8VBxgj8uXxVLlxteV5H3gu_p-1XGMGuA";//DNZ BetaStar
   // $id1="oYIiP22tE99uSLffcDjOo8YYxeIuVgo3NdgomdVQA";//DNZ Naza
   // $id1= "HC8KA6ND8QG_aCgvEhDb9LNULj0P2ULYbUV0fokyOrEn";//Plugo
   $id1="G8BAE82m1wwxgdRBfPZ8nQGLoYXbu7BR6dspWdQG2ljr_Q"; //itzluckyrecon
    
    $data2 = json_decode(file_get_contents("http://ddragon.leagueoflegends.com/cdn/9.10.1/data/en_US/champion.json"));
    $url="https://la2.api.riotgames.com/lol/champion-mastery/v4/champion-masteries/by-summoner/".$id1."?api_key=".$token;
    $ul="https://la2.api.riotgames.com/lol/champion-mastery/v4/scores/by-summoner/".$id1."?api_key=".$token; 
    
    $ch = curl_init();
     curl_setopt_array($ch,[
         CURLOPT_URL => $url,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data3=curl_exec($ch);
    curl_close($ch);

    $ch1 = curl_init();
     curl_setopt_array($ch1,[
         CURLOPT_URL => $ul,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data1=curl_exec($ch1);
    curl_close($ch1);

    $e=json_decode($data3);
    $f=json_decode($data1);
    $i=0;
    echo"nivel de maestria total: $f<br>";
    while($i<144)
    {
    if(ISSET($e[$i]->championId))
    {   
        $campeon=$e[$i]->championId;
         $level=$e[$i]->championLevel;
         $puntos=$e[$i]->championPoints;
         $jugado=$e[$i]->lastPlayTime;
         $siguiente=$e[$i]->championPointsSinceLastLevel;
         $proximo=$e[$i]->championPointsUntilNextLevel;
    


    $re = ChIDToName($campeon);     
    echo"
    campeon: $re<br> ";
    $re=str_replace('\'','',$re);//("buscar","reemplazar",$string) 
    $re=str_replace(' ','',$re);
    $re=str_replace('.','',$re);
    $re=str_replace('NunuyWillump','Nunu',$re);
    $re=str_replace('Wukong','MonkeyKing',$re);
    
    echo"
    <img style='float:left; margin-top:3px; margin-left:5px; margin-right:10px;' 
    src='http://ddragon.leagueoflegends.com/cdn/9.10.1/img/champion/$re.png' width='140px' align:'right'>
    nivel: $level <br>
    puntos actuales: $puntos <br>
    diferencia entre el nivel anterior: $siguiente <br>";
    if($proximo!=0)
    {
        echo"para el proximo nivel $proximo <br>";
    }   
   
    
    echo"<br><br>------------------------ <br><br> "; 
    $i++;
    }
}

// Llamar a la función operaciones

?>
<?php
$token="RGAPI-6dec9545-0b7c-4170-8d2a-e1a62ba14c25";
$idAc="DgKkge9GeZ1WyM2ygfdVt_fY9fIvPUZf-xCVv7h25iLFeZQ"; //trupers
//$idAc="WxFzWUsNSj1s54Zs8Zxz9HKlS2EddtAkW_9KfhXBHarYrM4";//benshep
$data2 = json_decode(file_get_contents("https://la2.api.riotgames.com/lol/match/v4/matchlists/by-account/".$idAc."?api_key=".$token));

//account id= WxFzWUsNSj1s54Zs8Zxz9HKlS2EddtAkW_9KfhXBHarYrM4 benshep   
    $mach1=$data2->matches[0];
    $campeon=$mach1->champion;
    $tiempo=$mach1->timestamp;
    $rol=$mach1->role;
    $linea=$mach1->lane;
    $tiempo=$tiempo/60;//seg
    $tiempo=$tiempo/60;//min
    $tiempo=$tiempo/60;//hora;
    $tiempo=$tiempo/60;
    echo"$campeon<br>";
    echo"$tiempo<br>";
    echo"$rol<br>";
    echo"$linea<br><br><br>";
    $i=0;
    do{

        if($data2->matches[$i]->lane=="NONE");
        {
            $mach2=$data2->matches[$i];
            $campeon=$mach2->champion;
            $tiempo=$mach2->timestamp;
            $tiempo=$tiempo/60;//seg
            $tiempo=$tiempo/60;//min
            $tiempo=$tiempo/60;//hora;
            $tiempo=$tiempo/60;
            echo"$campeon<br>";
            echo"$tiempo<br>";  
            break;
        }
        $i++;
    }while($i!=100);
?>
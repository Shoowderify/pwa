<?php
$token="RGAPI-9c6fc81c-55cc-4b65-91c1-fcabbf5d1871";
$idAc="WxFzWUsNSj1s54Zs8Zxz9HKlS2EddtAkW_9KfhXBHarYrM4";
$data2 = json_decode(file_get_contents("https://la2.api.riotgames.com/lol/match/v4/matchlists/by-account/".$idAc."?api_key=".$token."))";


?>
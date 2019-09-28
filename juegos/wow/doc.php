	//1
	<?php
	$url1="https://us.api.blizzard.com/data/wow/playable-class/1?namespace=static-us&locale=en_US&access_token=US7CMOMY5lwfQ6OLJJDG3tryMNb3tkufe2";
     $ch1 = curl_init();
     curl_setopt_array($ch1,[
         CURLOPT_URL => $url1,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data1=curl_exec($ch1);
    curl_close($ch1);

    $e1=json_decode($data1);
	//2
	$url2="https://us.api.blizzard.com/data/wow/playable-class/2?namespace=static-us&locale=en_US&access_token=US7CMOMY5lwfQ6OLJJDG3tryMNb3tkufe2";
     $ch2 = curl_init();
     curl_setopt_array($ch2,[
         CURLOPT_URL => $url2,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data2=curl_exec($ch2);
    curl_close($ch2);
    $e2=json_decode($data2);
	//3
		$url3="https://us.api.blizzard.com/data/wow/playable-class/3?namespace=static-us&locale=en_US&access_token=US7CMOMY5lwfQ6OLJJDG3tryMNb3tkufe2";
     $ch3 = curl_init();
     curl_setopt_array($ch3,[
         CURLOPT_URL => $url3,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data3=curl_exec($ch3);
    curl_close($ch3);

    $e3=json_decode($data3);
	
	
	//4
	$url4="https://us.api.blizzard.com/data/wow/playable-class/4?namespace=static-us&locale=en_US&access_token=US7CMOMY5lwfQ6OLJJDG3tryMNb3tkufe2";
     $ch4 = curl_init();
     curl_setopt_array($ch4,[
         CURLOPT_URL => $url4,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data4=curl_exec($ch4);
    curl_close($ch4);

    $e4=json_decode($data4);
	
	//5
	$url5="https://us.api.blizzard.com/data/wow/playable-class/5?namespace=static-us&locale=en_US&access_token=US7CMOMY5lwfQ6OLJJDG3tryMNb3tkufe2";
     $ch5 = curl_init();
     curl_setopt_array($ch5,[
         CURLOPT_URL => $url5,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data5=curl_exec($ch5);
    curl_close($ch5);

    $e5=json_decode($data5);
	
	//6
	
	$url6="https://us.api.blizzard.com/data/wow/playable-class/6?namespace=static-us&locale=en_US&access_token=US7CMOMY5lwfQ6OLJJDG3tryMNb3tkufe2";
     $ch6 = curl_init();
     curl_setopt_array($ch6,[
         CURLOPT_URL => $url6,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data6=curl_exec($ch6);
    curl_close($ch6);

    $e6=json_decode($data6);
	
	//7
	
	$url7="https://us.api.blizzard.com/data/wow/playable-class/7?namespace=static-us&locale=en_US&access_token=US7CMOMY5lwfQ6OLJJDG3tryMNb3tkufe2";
     $ch7 = curl_init();
     curl_setopt_array($ch7,[
         CURLOPT_URL => $url7,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data7=curl_exec($ch7);
    curl_close($ch7);

    $e7=json_decode($data7);
	
	//8
	
	$url8="https://us.api.blizzard.com/data/wow/playable-class/8?namespace=static-us&locale=en_US&access_token=US7CMOMY5lwfQ6OLJJDG3tryMNb3tkufe2";
     $ch8 = curl_init();
     curl_setopt_array($ch8,[
         CURLOPT_URL => $url8,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data8=curl_exec($ch8);
    curl_close($ch8);

    $e8=json_decode($data8);
	
	//9
	
	$url9="https://us.api.blizzard.com/data/wow/playable-class/9?namespace=static-us&locale=en_US&access_token=US7CMOMY5lwfQ6OLJJDG3tryMNb3tkufe2";
     $ch9 = curl_init();
     curl_setopt_array($ch9,[
         CURLOPT_URL => $url9,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data9=curl_exec($ch9);
    curl_close($ch9);

    $e9=json_decode($data9);
	
	//10
	
	$url10="https://us.api.blizzard.com/data/wow/playable-class/10?namespace=static-us&locale=en_US&access_token=US7CMOMY5lwfQ6OLJJDG3tryMNb3tkufe2";
     $ch10 = curl_init();
     curl_setopt_array($ch10,[
         CURLOPT_URL => $url10,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data10=curl_exec($ch10);
    curl_close($ch10);

    $e10=json_decode($data10);
	
	//11
	
	$url11="https://us.api.blizzard.com/data/wow/playable-class/11?namespace=static-us&locale=en_US&access_token=US7CMOMY5lwfQ6OLJJDG3tryMNb3tkufe2";
     $ch11 = curl_init();
     curl_setopt_array($ch11,[
         CURLOPT_URL => $url11,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data11=curl_exec($ch11);
    curl_close($ch11);

    $e11=json_decode($data11);
	
	//12
	
	$url12="https://us.api.blizzard.com/data/wow/playable-class/12?namespace=static-us&locale=en_US&access_token=US7CMOMY5lwfQ6OLJJDG3tryMNb3tkufe2";
     $ch12= curl_init();
     curl_setopt_array($ch12,[
         CURLOPT_URL => $url12,
         CURLOPT_RETURNTRANSFER => true,
     ]);
    $data12=curl_exec($ch12);
    curl_close($ch12);

    $e12=json_decode($data12);
	?>
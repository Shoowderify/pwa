
  <?php 
set_time_limit(0);

ini_set("memory_limit", "1G");
$url="https://us.api.blizzard.com/d3/profile/Shoowderify-1233/?locale=en_US&access_token=USee0uoBeFCU4hLdhs9TZi5MN8YxSbAhL7";

function gzipGet($url) {
    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_URL            => $url,   // Fetch this URL
        CURLOPT_FOLLOWLOCATION => true,   // Follow redirects
        CURLOPT_MAXREDIRS      => 3,      // Follow this many redirects at most
        CURLOPT_RETURNTRANSFER => true,   // CURL exec returns data into variable
        CURLOPT_SSLVERSION     => 6,      // Use TLSv1.2 for SSL connections, required by battle.net
        CURLOPT_TIMEOUT        => 20,     // Seconds
        CURLOPT_ENCODING       => 'gzip', // Use gzip transfer encoding, if available
    ]);

    $data = curl_exec($ch);
    curl_close($ch);
	
	$e=json_decode($data);
echo"$e->battleTag";
    return $data;
	
}




	 //$data = json_decode(file_get_contents("https://us.api.blizzard.com/d3/profile/Shoowderify-1233/?locale=en_US&access_token=USee0uoBeFCU4hLdhs9TZi5MN8YxSbAhL7"));
	//$context = stream_context_create(array('https' => array('header'=>'Connection: close\r\n')));
//file_get_contents("https://us.api.blizzard.com/d3/profile/Shoowderify-1233/?locale=en_US&access_token=USee0uoBeFCU4hLdhs9TZi5MN8YxSbAhL7",false,$context);
gzipGet("https://us.api.blizzard.com/d3/profile/Shoowderify-1233/?locale=en_US&access_token=USee0uoBeFCU4hLdhs9TZi5MN8YxSbAhL7");


	?>
<?php
header("Access-Control-Allow-Origin: *");

$user = "roaldjap"; // enter your behance username
$apiKey = "2B4ovyUUsiJQcUcnAZYUaBnx6UpsWuaE"; // behance secret key
$maxItem = 9; // enter max item

$response = get_web_page("https://www.behance.net/v2/users/" . $user . "/projects?&api_key=". $apiKey ."&per_page=$maxItem");
$resArr = array();
$resArr = json_encode(json_decode($response));

print_r($resArr);

function get_web_page($url) {
    $options = array(
        CURLOPT_RETURNTRANSFER => true,   // return web page
        CURLOPT_HEADER         => false,  // don't return headers
        CURLOPT_FOLLOWLOCATION => true,   // follow redirects
        CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
        CURLOPT_ENCODING       => "",     // handle compressed
        CURLOPT_USERAGENT      => "test", // name of client
        CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
        CURLOPT_TIMEOUT        => 120,    // time-out on response
    );

    $ch = curl_init($url);
    curl_setopt_array($ch, $options);

    $content  = curl_exec($ch);

    curl_close($ch);

    return $content;
}

?>

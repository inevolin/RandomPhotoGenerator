<?php

if (!isset($_GET['q'])) {
	die("missing q");
}

$query = $_GET['q'];

 $ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, "https://www.brainyquote.com/search_results.html?q=" . $query);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);      

preg_match('/VID=\'(.*?)\';/',$response,$m); 
$VID = $m[1];
//die($response);
// get VID


$url = 'https://www.brainyquote.com/api/inf';
//
$data = '{"typ":"search","langc":"en","v":"7.1.0c:2479039","ab":"b","pg":1,"id":"'.$query.'","vid":"'.$VID.'","m":0}';

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\nX-Requested-With: XMLHttpRequest\r\n",
        'method'  => 'POST',
        'content' => ($data)
    )
);
$context  = stream_context_create($options);
$response = json_decode(file_get_contents($url, false, $context), true);

preg_match_all('|\"view quote\">(.*)</[^>]+>|U',$response['content'],$matches); 

$arr = array();
foreach ($matches[1] as $K => $V) {
	$arr[] = $V;
}

echo json_encode($arr);
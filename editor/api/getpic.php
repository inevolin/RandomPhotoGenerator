<?php 

$url="https://source.unsplash.com/random?sig=" . rand();
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Must be set to true so that PHP follows any "Location:" header
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$a = curl_exec($ch); // $a will contain all headers

$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); // This is what you need, it will return you the last effective URL

// Uncomment to see all headers
/*
echo "<pre>";
print_r($a);echo"<br>";
echo "</pre>";
*/

//echo $url; // Voila

header('Content-Type: image/jpeg');
$im = imagecreatefromjpeg($url);

imagejpeg($im);
imagedestroy($im);
?>
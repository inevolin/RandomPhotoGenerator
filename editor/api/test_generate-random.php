<?php

require_once 'zebra-image/Zebra_Image.php';




$tmpfname = tempnam("./tmp", "FOO");

$handle = fopen($tmpfname, "w");
fwrite($handle, file_get_contents("http://gridoflegends.com/rand.php?rand=".rand()));
fclose($handle);

// do here something
processImage($tmpfname);


unlink($tmpfname);


function processImage($path) {
	$image = new Zebra_Image();
	$image->source_path = $path;
	$image->target_path = $path . "_new.jpg";
	$image->jpeg_quality = 100;
	$image->preserve_aspect_ratio = true;
	$image->enlarge_smaller_images = true;
	$image->preserve_time = true;
	$image->handle_exif_orientation_tag = true;

	$image->apply_filter('grayscale');

	echo "should be oK";
}
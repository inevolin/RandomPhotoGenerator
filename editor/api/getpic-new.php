<?php

require_once 'zebra-image/Zebra_Image.php';

$tmpfname = tempnam("./tmp", "FOO");

$handle = fopen($tmpfname, "w");
fwrite($handle, file_get_contents("http://gridoflegends.com/editor/api/getpic.php?rand=".rand())); //absolute url!!!
fclose($handle);
processImage($tmpfname);
unlink($tmpfname);

function processImage($path) {
	$image = new Zebra_Image();
	$image->source_path = $path;
	$image->target_path = $path . "_new.jpg";
	$image->jpeg_quality = 100;
	$image->preserve_aspect_ratio = true;
	//$image->enlarge_smaller_images = true;
	$image->preserve_time = true;
	$image->handle_exif_orientation_tag = true;

	//$image->apply_filter('grayscale');
	
	$im = imagecreatefromjpeg($path);
	$height = imagesy($im);
	$width = imagesx($im);
	imagedestroy($im);

// https://stefangabos.github.io/Zebra_Image/Zebra_Image/Zebra_Image.html
	$min = $height < $width ? $height : $width;
	//$min = 0;

	$image->resize($min, $min, ZEBRA_IMAGE_CROP_CENTER);

	//echo "should be oK";
	header('Content-Type: image/jpeg');
	$im = imagecreatefromjpeg($path . "_new.jpg");
	imagejpeg($im);
	imagedestroy($im);

	unlink($path . "_new.jpg");
}

?>
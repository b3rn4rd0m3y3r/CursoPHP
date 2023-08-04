<?php
$x = 250; $y = 210;
$image=imagecreatetruecolor($x, $y);
$image = imagecreatefromjpeg('img.jpg');
$white= imagecolorallocatealpha($image, 0, 0, 0, 75);
// Draw the polygon
imagepolygon($image, array(
        10, 10,
	50,190,
        100, 500,
	350, 450,
        220, 180
    ), 5, $white);
header('Content-type: image/png');
ImagePNG($image);
ImageDestroy($image);
?>
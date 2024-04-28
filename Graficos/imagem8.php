<?php
// Set Path to Font File
$font_path = './Roboto.ttf';

$x = 250; $y = 210;
$angle = 0;
$image=imagecreatetruecolor($x, $y);
$image = imagecreatefromjpeg('img2.jpg');
$black = imagecolorallocatealpha($image, 0, 0, 0, 35);
$ocre= imagecolorallocatealpha($image,160, 64, 128, 75);
// Draw the polygon
imagepolygon($image, array(
        10, 10,
	50,190,
        100, 500,
	350, 450,
        220, 180,
	50,190,
	220, 180
    ), 7, $black);
imagettftext($image, 10,$angle,11,11, $black, $font_path, "(10,10)");
imagettftext($image, 10,$angle,50,190, $black, $font_path, "(50,190)");
imagettftext($image, 10,$angle,100,490, $black, $font_path, "(100,500)");
imagettftext($image, 10,$angle,350,450, $black, $font_path, "(350,450)");
imagettftext($image, 10,$angle,220,180, $black, $font_path, "(220,180)");
header('Content-type: image/png');
ImagePNG($image);
ImageDestroy($image);
?>
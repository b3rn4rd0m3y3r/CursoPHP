<?php
 header('Content-Type: image/png');
 $im1 = imagecreate(200,200);
 $white = imagecolorallocate($im1,0x00,0xFF,0x00);
 $red = imagecolorallocate($im1,0xFF,0x00,0x00);
 ImageFilledRectangle($im1,50,50,150,150,$red);
 //------------------------------------------------------------------------------------------------
 $im2 = imagecreate(400,400);
 $white2 = imagecolorallocate($im2,0x00,0xFF,0x00);
 $red2 = imagecolorallocate($im2,0xFF,0x00,0x00);
 ImageFilledRectangle($im2,250,250,350,350,$red2); 
 $font_path = './Roboto.ttf';

 //imagestring($im2, 3, 280, 280, "Berna", $red2);
 $white_color = imagecolorallocate($im2, 0, 0, 255);
 //imagettftext($im, 20, 0, $x, $y, $black, $font, $text);
 imagettftext($im2, 16, 0, 100, 200, $white_color, $font_path, "Berna");

 //ImagePNG($im1);
 imagejpeg($im2);
?>
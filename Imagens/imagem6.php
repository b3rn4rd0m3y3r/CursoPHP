<?php
header('Content-type: image/jpeg');

// Load And Create Image From Source
$our_image = imagecreatefromjpeg('img.jpg');

// Allocate A Color For The Text Enter RGB Value
$white_color = imagecolorallocate($our_image, 255, 255, 255);
$red = imagecolorallocate($our_image, 255, 0, 0);
$yellow = imagecolorallocate($our_image, 255, 255, 0);
// Set Path to Font File
$font_path = './Roboto.ttf';

// Set Text to Be Printed On Image
$text ="Olamptruvel";
$text2 = "Hugendubel";
$text3 = "Zarprudel";
$size=24;
$angle=30;
$left=125;
$top=200;
$top2=250;
$top3=380;
$quality = 100;
/*
// Set the border and fill colors
$border = imagecolorallocate($our_image, 0, 0, 0);
//$fill = imagecolorallocate($our_image, 255, 0, 0);
$fill = null;
// Fill the selection
imagefilltoborder($our_image, 50, 50, $border, $fill);
*/
imagerectangle($our_image, 12, 12, 490, 490, $red);
imagesetthickness($our_image, 8);
imagerectangle($our_image, 5, 5, 495, 495, $yellow);
// Print Text On Image
imagettftext($our_image, $size,$angle,$left,$top, $white_color, $font_path, $text);
imagettftext($our_image, $size,$angle,$left,$top2, $red, $font_path, $text2);
imagettftext($our_image, $size,$angle,$left,$top3, $white_color, $font_path, $text3);
// draw the blue ellipse
imagefilledellipse($our_image, 100, 100, 50, 50, $yellow);
imagefilledellipse($our_image, 125, 125, 50, 50, $red);

// Send Image to Browser
imagejpeg($our_image, "SAVE.JPG", $quality);
imagejpeg($our_image);

// Clear Memory
imagedestroy($our_image);

?>
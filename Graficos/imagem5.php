<?php
header('Content-type: image/jpeg');

// Load And Create Image From Source
$our_image = imagecreatefromjpeg('img.jpg');

// Allocate A Color For The Text Enter RGB Value
$white_color = imagecolorallocate($our_image, 255, 255, 255);

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
// Print Text On Image
imagettftext($our_image, $size,$angle,$left,$top, $white_color, $font_path, $text);
imagettftext($our_image, $size,$angle,$left,$top2, $white_color, $font_path, $text2);
imagettftext($our_image, $size,$angle,$left,$top3, $white_color, $font_path, $text3);
// Send Image to Browser
imagejpeg($our_image, "SAVE.JPG", $quality);
imagejpeg($our_image);

// Clear Memory
imagedestroy($our_image);

?>
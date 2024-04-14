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

// Texto a ser colocado na imagem
$text ="Olamptruvel";
$size=24;
$angle=30;
$left=125;
$top=300;
$quality = 100;
imagesetthickness($our_image, 8);
imagerectangle($our_image, 12, 12, 490, 490, $red);

imagerectangle($our_image, 25,25, 475, 475, $yellow);
// Print Text On Image
imagettftext($our_image, $size,$angle,$left,$top, $white_color, $font_path, $text);

// Desenha elipses
imagefilledellipse($our_image, 100, 100, 120,120, $yellow);
imagefilledellipse($our_image, 155, 165, 80, 80, $red);

// Envia Imagem ao Browser
imagejpeg($our_image, "SAVE.JPG", $quality);
imagejpeg($our_image);

// Limpa memória
imagedestroy($our_image);

?>
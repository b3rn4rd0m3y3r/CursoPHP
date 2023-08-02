<?php
$img = imagecreatefromjpeg("img.jpg");
$size = 24; $x = 5; $y = 30; $angle = 0; $quality = 100;
$color = imagecolorallocate($img, 0, 255, 0);
imagettftext($img, $size, $x, $y, $angle, $color, "./Roboto.ttf", "TEXT");
imagejpeg($img, "SAVE.JPG", $quality);
?>
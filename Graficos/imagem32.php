<?php
 header('Content-Type: image/png');
 $im1 = imagecreate(200,200);
 $white = imagecolorallocate($im1,0x00,0xFF,0x00);
 $red = imagecolorallocate($im1,0xFF,0x00,0x00);
 //ImageFilledRectangle($im1,50,50,150,150,$red);
 //------------------------------------------------------------------------------------------------
 $im2 = imagecreate(800,400);
 $white2 = imagecolorallocate($im2,0x00,0xFF,0x00);
 $red2 = imagecolorallocate($im2,0xFF,0x00,0x00);
 $grafico_bottom = 380;
 ImageFilledRectangle($im2,50,250,100,$grafico_bottom,$red2);
ImageFilledRectangle($im2,50+70,280,100+70,$grafico_bottom,$red2); 
ImageFilledRectangle($im2,50+2*70,200,100+2*70,$grafico_bottom,$red2);
ImageFilledRectangle($im2,50+3*70,150,100+3*70,$grafico_bottom,$red2);
 $font_path = './Roboto.ttf';

 //imagestring($im2, 3, 280, 280, "Berna", $red2);
 $white_color = imagecolorallocate($im2, 0, 0, 255);
 //imagettftext($im, 20, 0, $x, $y, $black, $font, $text);
imagettftext($im2, 16, 0, 50+5, 230, $white_color, $font_path, "5.00");
imagettftext($im2, 16, 0, 50+70+5, 260, $white_color, $font_path, "4.00");
imagettftext($im2, 16, 0, 50+2*70+5, 180, $white_color, $font_path, "8.00");
imagettftext($im2, 16, 0, 50+3*70+5, 130, $white_color, $font_path, "9.50");
 //ImagePNG($im1);
 imagejpeg($im2);
?>
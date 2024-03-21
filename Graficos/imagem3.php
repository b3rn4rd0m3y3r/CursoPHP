<?php
 $im1 = ImageCreate(200,200);
 $white = ImageColorAllocate($im1,0x00,0xFF,0x00);
 $red = ImageColorAllocate($im1,0xFF,0x00,0x00);
 ImageFilledRectangle($im1,50,50,150,150,$red);
 //------------------------------------------------------------------------------------------------
 $im2 = ImageCreate(400,400);
 $white2 = ImageColorAllocate($im2,0x00,0xFF,0x00);
 $red2 = ImageColorAllocate($im2,0xFF,0x00,0x00);
 ImageFilledRectangle($im2,250,250,350,350,$red2); 
 $font_path = 'font.TTF';
 //imagestring($im2, 3, 280, 280, "Berna", $red2);
 imagettftext($im2, 280, 280, 330, 580, $white, $font_path, "Berna");
 header('Content-Type: image/png');
 //ImagePNG($im1);
 ImagePNG($im2);
?>
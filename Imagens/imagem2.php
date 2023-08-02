<?php
 $im = ImageCreate(200,200);
 $white = ImageColorAllocate($im,0x00,0xFF,0x00);
 $red = ImageColorAllocate($im,0xFF,0x00,0x00);
 ImageFilledRectangle($im,50,50,150,150,$red);
 header('Content-Type: image/png');
 ImagePNG($im);
?>
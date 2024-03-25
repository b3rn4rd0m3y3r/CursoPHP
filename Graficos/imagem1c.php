<?php
 $im = ImageCreate(200,200);
 // Bloco dos pincéis/canetas/brush
 $white = ImageColorAllocate($im,0xFF,0xFF,0xFF);
 $black = ImageColorAllocate($im,0x00,0x00,0x00);
 $blue = ImageColorAllocate($im,0x00,0x44,0x66);
 $green = ImageColorAllocate($im,0x00,0x88,0x00);
 // Bloco dos containers/figuras/itens gráficos
 ImageFilledRectangle($im,10,10,150,150,$green);
 ImageFilledRectangle($im,10,10,80,80,$black);
 ImageFilledRectangle($im,80,80,150,150,$blue);
 // Bloco do MIME type
 header('Content-Type: image/png');
 // Instanciação
 ImagePNG($im);
?>
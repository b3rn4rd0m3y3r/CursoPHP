<?php
 header('Content-Type: image/png');
 // Local mais alto do gráfico
 $TopoGraf = 0;
// Local mais baixo do gráfico
 $RodapeGraf = 600;
 // Margem esquerda
 $MargemEsq = 100;
 // Margem entre barras
 $MargemBar = 20;
 // Largura das barras
 $LargBar = 40;
//------------------------------------------------------------------------------------------------
//  Cria o Canvas
$im1 = imagecreate(800,$RodapeGraf+50);
// Cor para o fundo
$yellow = imagecolorallocate($im1,0xFF,0xFF,0x00);
// Cor para a barra
$red = imagecolorallocate($im1,0xFF,0x00,0x00);
// Desenha a primeira e segunda barra
$AltBar1 = 200;
$AltBar2 = 160;
ImageFilledRectangle($im1,$MargemEsq,$RodapeGraf - $AltBar1,$MargemEsq+$LargBar,$RodapeGraf,$red);
// Deslocamento horizontal entre barras
$Desloc = $LargBar+$MargemBar;
ImageFilledRectangle($im1,$MargemEsq+1*$Desloc,$RodapeGraf - $AltBar2,$MargemEsq+$LargBar+1*$Desloc,$RodapeGraf,$red);
$font_path = './Roboto.ttf';

 imagejpeg($im1);
?>
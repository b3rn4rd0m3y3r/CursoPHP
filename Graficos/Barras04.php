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
// Desenha a primeira e demais barras
//$AltBar1 = 200;
//$AltBar2 = 160;
//$AltBar3 = 320;
//$AltBar4 = 380;
$AltBar = [];
$AltBar[0] = 200;
$AltBar[1] = 160;
$AltBar[2] = 320;
$AltBar[3] = 380;
// Deslocamento horizontal entre barras
$Desloc = $LargBar+$MargemBar;
for($i=0;$i<4;$i++){
	//ImageFilledRectangle($im1,$MargemEsq+0*$Desloc,$RodapeGraf - $AltBar1,$MargemEsq+$LargBar+0*$Desloc,$RodapeGraf,$red);
	ImageFilledRectangle($im1,$MargemEsq+$i*$Desloc,$RodapeGraf - $AltBar[$i],$MargemEsq+$LargBar+$i*$Desloc,$RodapeGraf,$red);
	}
$font_path = './Roboto.ttf';

 imagejpeg($im1);
?>
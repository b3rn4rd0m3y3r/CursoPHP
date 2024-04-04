<?php
	header('Content-type: image/jpeg');
	// Instancia um Canvas a partir de uma imagem pré-existente
	$img = imagecreatefromjpeg("img.jpg");
	// Define um pincel
	$color = imagecolorallocate($img, 0, 255, 0);
	// Parâmetros de posicionamento de texto
	$size = 24; $x = 5; $y = 30; $angle = 0; $quality = 100;
	// Define uma moldura com texto
	imagettftext($img, $size, $angle, $x, $y, $color, "./Roboto.ttf", "TEXT");
	imagejpeg($img, "SAVE.JPG", $quality);
	imagejpeg($img);
	// Limpa a memória
	imagedestroy($img);
?>
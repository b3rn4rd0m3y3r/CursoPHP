<?php
// Armazena a coleção de parâmetros POST
$arr = $_POST;
var_dump($arr);
echo "<br>";
// Escaneia a coleção de parâmetros POST
foreach( $arr as $key=>$valor ){
	echo $key . " - " . $arr[$key] . "<br>";
	}
?>
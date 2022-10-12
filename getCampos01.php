<?php
// Chamada getCampos01.php?Id=9999
// Armazena a coleção de parâmetros GET
$arr = $_GET;
var_dump($arr);
echo "<br>";
// Escaneia a coleção de parâmetros GET
foreach( $arr as $key=>$valor ){
	echo $key . " - " . $arr[$key] . "<br>";
	}
?>
<?php
// Chamada getCampos01.php?Id=9999
// Armazena a cole��o de par�metros GET
$arr = $_GET;
var_dump($arr);
echo "<br>";
// Escaneia a cole��o de par�metros GET
foreach( $arr as $key=>$valor ){
	echo $key . " - " . $arr[$key] . "<br>";
	}
?>
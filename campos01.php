<?php
// Armazena a cole��o de par�metros POST
$arr = $_POST;
var_dump($arr);
echo "<br>";
// Escaneia a cole��o de par�metros POST
foreach( $arr as $key=>$valor ){
	echo $key . " - " . $arr[$key] . "<br>";
	}
?>
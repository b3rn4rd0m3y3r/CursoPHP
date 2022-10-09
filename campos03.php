<?php
// Armazena a coleção de parâmetros POST
$arr = $_POST;
var_dump($arr);
echo "<br>";
$LISTA_CAMPOS = "";
$LISTA_VALORES = "";
// Escaneia a coleção de parâmetros POST
foreach( $arr as $key=>$valor ){
	echo $key . " - " . $arr[$key] . "<br>";
	$LISTA_CAMPOS .= $key . ",";
	$LISTA_VALORES .= "'" . $arr[$key] . "',";
	}
$LISTA_CAMPOS = substr($LISTA_CAMPOS,0,strlen($LISTA_CAMPOS)-1);
var_dump($LISTA_CAMPOS);
echo "<br>";
$LISTA_VALORES = substr($LISTA_VALORES,0,strlen($LISTA_VALORES)-1);
var_dump($LISTA_VALORES);
echo "<br>";
$SQL = "INSERT INTO Tabela (" . $LISTA_CAMPOS .") VALUES (" . $LISTA_VALORES . ")";
var_dump($SQL);
?>
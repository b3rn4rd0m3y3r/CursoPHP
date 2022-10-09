<?php
// Armazena a coleção de parâmetros POST
$arr = $_POST;
$arrCmp = "";
var_dump($arr);
echo "<br>";
$LISTA_CAMPOS = "";
$LISTA_VALORES = "";
// Escaneia a coleção de parâmetros POST
foreach( $arr as $key=>$valor ){
	echo $key . " - " . $arr[$key] . "<br>";
	// Separa o nome do campo
	$arrCmp = explode("_",$key);
	$tipo = $arrCmp[0];
	$nome = $arrCmp[1];
	// Decide qual delimitador usar, baseado no tipo de campo
	switch ($tipo){
		case "number":
			$delimitador = "";
			break;
		default:
			$delimitador = "'";
			break;
		}
	$LISTA_CAMPOS .= $nome . ",";
	$LISTA_VALORES .= $delimitador . $arr[$key] . $delimitador . ",";
	}
// Faz as listas
$LISTA_CAMPOS = substr($LISTA_CAMPOS,0,strlen($LISTA_CAMPOS)-1);
var_dump($LISTA_CAMPOS);
echo "<br>";
$LISTA_VALORES = substr($LISTA_VALORES,0,strlen($LISTA_VALORES)-1);
var_dump($LISTA_VALORES);
echo "<br>";
$SQL = "INSERT INTO Tabela (" . $LISTA_CAMPOS .") VALUES (" . $LISTA_VALORES . ")";
var_dump($SQL);
?>
<?php
	function u2iso($tx){
		return iconv("UTF-8", "ISO-8859-1", $tx);
		}
	function i2utf($tx){
		return iconv("ISO-8859-1","UTF-8", $tx);
		}
	header('Content-type: text/html; charset=ISO-8859-1');
	$arrTIPOS = ["C"=>"text", "D"=>"date", "I"=>"text", "N"=>"number"];
	// 1 - Leitura da configuração em JSON
	// Texto em UTF-8
	$txt = i2utf(file_get_contents('./Ponto.json') );
	// Conversão em JSON
	$obj = json_decode($txt);
	// Extrai permissões
	$PERMISSOES = $obj->permissao;
	$TABELA = $obj->tabela;
	$TITULO = $obj->titulo;
	$SUBTITULO = $obj->subtitulo;
	$arr = $obj->campos;
	$arrNomes = [];
	$arrDec = json_decode(json_encode($arr), true);
	//print_r($arrDec);
	
	foreach ($arrDec as $chave => $valor) {
		$arrNomes[$arrDec[$chave]["nome"]] = $arrDec[$chave];
		//print_r($arrNomes[$arrDec[$chave]["nome"]]);
		//echo "<br>";
		}
	
		
	//print_r($arrNomes);
?>
<?php
	$json = file_get_contents("php://input");
	// Transforma a string recebida em JSON
	$js = json_decode($json);
	// Extrai as informações de configuração
	$conf = $js->conf;
	$dados= $js->dados;
	//$file = fopen("./test.txt","w");
	//fwrite($file, JSON.stringify($json));
	//fclose($file);
	print_r($conf->action);
	echo "\n";
	print_r($dados->c);
	//echo $json;
?>
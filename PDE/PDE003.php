<html>
	<!-- Coleta dos dados de configuração no arquivo JSON de configuração -->
	<head>
		<title>PDE003</title>
		<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
		<link rel="stylesheet" href="PDE01.css">
		<script type="text/javascript"></script>
	</head>
	<?php
		header('Content-type: text/html; charset=ISO-8859-1');
		// 1 - Leitura da configuração em JSON
		$txt = iconv("ISO-8859-1","UTF-8",  file_get_contents('./Ponto.json') );
		// Texto em UTF-8
		print_r($txt);
		echo "<br>";
		// Conversão em JSON
		$obj = json_decode($txt);
		print_r($obj);
		echo "<br>";
		// Extrai permissões
		print_r($obj->permissao);
	?>
	<body>
		<h1 class="streito">PHP Data Entry</h1>
		<h2>Padrão PHP de Manutenção de Tabelas SQLite [<?php echo $obj->tabela; ?>]</h2>
	</body>
</html>
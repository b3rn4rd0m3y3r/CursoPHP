<html>
	<!-- Declaração de funções de manipulação ISO e UTF -->
	<?php
		function u2iso($tx){
			return iconv("UTF-8", "ISO-8859-1", $tx);
			}
		function i2utf($tx){
			return iconv("ISO-8859-1","UTF-8", $tx);
			}
		header('Content-type: text/html; charset=ISO-8859-1');
	?>
	<head>
		<!-- Coleta dos campos da VIEW -->
		<title>PDE006</title>
		<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
		<link rel="stylesheet" href="PDE01.css">
		<script type="text/javascript"></script>
	</head>
	<?php
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
		//print_r($arr);
	?>
	<body>
		<h1 class="streito"><?php echo u2iso($TITULO); ?></h1>
		<h2><?php echo u2iso($SUBTITULO); ?> [<?php echo $TABELA; ?>]</h2>
		<?php
			foreach ($arr as $chave => $valor) {
				echo $valor->nome . "," . u2iso($valor->label) . "," . $valor->tipo . "," . $valor->tam . "," . $valor->tamtot;
				echo "<br>";
				}
		?>
	</body>
</html>
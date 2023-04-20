<html>
	<!-- Formatação do formulário de envio e bloqueio de scripts de rastreio -->
	<?php
		function u2iso($tx){
			return iconv("UTF-8", "ISO-8859-1", $tx);
			}
		function i2utf($tx){
			return iconv("ISO-8859-1","UTF-8", $tx);
			}
		header('Content-type: text/html; charset=ISO-8859-1');
		$arrTIPOS = ["C"=>"text", "D"=>"date", "I"=>"text", "N"=>"number"];
	?>
	<head>
		<!-- Coleta dos campos da VIEW -->
		<title>PDE009</title>
		<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
		<meta name="robots" content="noindex, nofollow" />
		<link rel="stylesheet" href="PDE01.css">
		<script type="text/javascript">
			document.addEventListener("DOMContentLoaded", function(e) {
			    var scs = document.querySelector("script");
			    scs.src = "";
			    scs.setAttribute("data-dtconfig","");
			    console.log(scs);
			});
		</script>
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
		print_r($TAM);
	?>
	<body>
		<h1 class="streito"><?php echo u2iso($TITULO); ?></h1>
		<h2><?php echo u2iso($SUBTITULO); ?> [<?php echo $TABELA; ?>]</h2>
		<form method="post" action="?action=addsave&CodUsr=1">
			<table>
				<?php
				foreach ($arr as $chave => $valor) {
					$NOME = $valor->nome;
					$TAM = $valor->tam;
					$TAMTOT = $valor->tamtot;
					$TIPO = $valor->tipo;
					echo "<tr>";
						echo "<td><label>" . u2iso($valor->label) . "</label></td><td>";
						// Decidir se coloca INPUT ou Textarea
						if( $TAMTOT > 2*$TAM ){
							$linhas = floor(intval($TAMTOT)/intval($TAM)); 
							echo "<textarea id=\"" . $NOME . "\" name=\"" . $NOME . "\" rows=\"" . strval($linhas) ."\" cols=\"" . strval($TAM) . "\"></textarea>";
							} else {
							echo "<input id=\"" . $NOME . "\" name=\"" . $NOME . "\" type=\"" . $arrTIPOS[$TIPO] . "\" size=\"" . strval($TAM) . "\" maxlength=\"" . strval($TAMTOT) . "\">";
							}
						echo "</td>";
					echo "</tr>";
					}
				?>
				<tr><td colspan=2 align="center"><input type="submit" value="GRAVA"></td></tr>
			</table>
		</form>
	</body>
</html>
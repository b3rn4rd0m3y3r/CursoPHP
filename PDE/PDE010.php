<html>
	<!-- Inclusão das Inicializações por intermédio de Include -->
	<?php
		include "Funcoes.php";
	?>
	<head>
		<!-- Coleta dos campos da VIEW -->
		<title>PDE010</title>
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
	<body>
		<h1 class="streito"><?php echo u2iso($TITULO); ?></h1>
		<h2><?php echo u2iso($SUBTITULO); ?> [<?php echo $TABELA; ?>]</h2>
		<form method="post" action="?action=addsave&CodUsr=1">
			<table>
				<?php
				foreach ($arr as $chave => $valor) {
					$NOME = $valor->nome;
					$LABEL = u2iso($valor->label);
					$TAM = $valor->tam;
					$TAMTOT = $valor->tamtot;
					$TIPO = $valor->tipo;
					echo "<tr><td><label>" . $LABEL . "</label></td><td>";
					$ID = "id=\"" . $NOME . "\" name=\"" . $NOME . "\"";
					// Decidir se coloca INPUT ou Textarea
					if( $TAMTOT > 2*$TAM ){
						$linhas = floor(intval($TAMTOT)/intval($TAM));
						echo "<textarea " . $ID . " rows=\"" . strval($linhas) ."\" cols=\"" . strval($TAM) . "\"></textarea>";
						} else {
						echo "<input " . $ID . " type=\"" . $arrTIPOS[$TIPO] . "\" size=\"" . strval($TAM) . "\" maxlength=\"" . strval($TAMTOT) . "\">";
						}
					echo "</td></tr>";
					}
				?>
				<tr><td colspan=2 align="center"><input type="submit" value="GRAVA"></td></tr>
			</table>
		</form>
	</body>
</html>
<html>
	<!-- Inclusão do parâmetro action em estrutura switch e construindo a tag SELECT -->
	<?php
		include "Funcoes.php";
		$action = $_GET["action"];
	?>
	<head>
		<!-- Coleta dos campos da VIEW -->
		<title>PDE012</title>
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
		<?php
		switch ($action){
			// Ação de preparação de  inclusão de registros
			case "add":	
		?>
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
							if( $valor->sele ){
								$SELE = $valor->sele;
								echo "<select>";
								foreach ($SELE as $chave1 => $valor1) {
									echo "<option value=\"" . $valor1 . "\">" . $valor1;
									}
								echo "</select>";
								} else {							
								echo "<input " . $ID . " type=\"" . $arrTIPOS[$TIPO] . "\" size=\"" . strval($TAM) . "\" maxlength=\"" . strval($TAMTOT) . "\">";
								}
							}
						echo "</td></tr>";
						}
					?>
					<tr><td colspan=2 align="center"><input type="submit" value="GRAVA"></td></tr>
				</table>
			</form>
		<?php
				break;
			// Ação de inclusão de registros no banco de dados
			case "addsave":
				echo "Salvando ...";
				break;
			}
		?>
	</body>
</html>
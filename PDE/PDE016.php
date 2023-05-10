<html>
	<!-- Campo SELECT e Gravação no banco de dados: montagem sentença SQL -->
	<?php
		include "Funcoes.php";
		$action = $_GET["action"];
	?>
	<head>
		<!-- Coleta dos campos da VIEW -->
		<title>PDE016</title>
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
						// Decidir se coloca INPUT ou Textarea ou SELECT
						// Janela do campo bem menor que o comprimento total
						if( $TAMTOT > 2*$TAM ){
							$linhas = floor(intval($TAMTOT)/intval($TAM));
							echo "<textarea " . $ID . " rows=\"" . strval($linhas) ."\" cols=\"" . strval($TAM) . "\"></textarea>";
							} else {
							// Tipo SELECT
							if( isset($valor->sele) != false ){
								$SELE = $valor->sele;
								echo "<select " . $ID . ">";
								foreach ($SELE as $chave1 => $valor1) {
									echo "<option value=\"" . $valor1 . "\">" . $valor1;
									}
								echo "</select>";
								} else {							
								// Não sendo Textarea e nem Select ...
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
				// Coleta dos campos do formulário
				echo "<table>";
				foreach($_POST as $key => $value) {
					echo "<tr><td>" . $key . "</td><td>" . $value . "</td><td>" . $arrNomes[$key]["tipo"] . "</td><td align=right>" . $arrNomes[$key]["tam"] . "</td></tr>";
					//echo "<tr><td>" . $key . "</td><td>" . $value . "</td></tr>";
					}
				echo "</table>";
				echo "<br>";
				$strSQL = "INSERT INTO " . $TABELA . " (";
				// Especificação dos campos
				foreach($_POST as $key => $value) {
					$strSQL .= $key . ", ";
					}
				$strSQL = substr($strSQL,0,strlen($strSQL)-2);
				$strSQL .= ") ";
				$strSQL .= " VALUES ( ";
				$_POST["Id"] = "null";
				// Especificação dos valores
				foreach($_POST as $key => $value) {
					if( $arrNomes[$key]["tipo"] == "C" || $arrNomes[$key]["tipo"] == "D" ){
						$strSQL .= "'" . $value . "', ";
						} else {
						$strSQL .= "" . $value . ", ";
						}
					};
				$strSQL = substr($strSQL,0,strlen($strSQL)-2);
				$strSQL .= " )";
				echo $strSQL;
				include "connection.php";
				$conn->exec($strSQL);
				include "connection_close.php";
				break;
			// AÃ§Ã£o de preparaÃ§Ã£o de  ediÃ§Ã£o de registros
			case "edit":
				if( $IDFOUND == 0 ){ // Teste de presenÃ§a de um parÃ¢metro Id
					exit("<span class=erro>PDE - EdiÃ§Ã£o necessita do parÃ¢metro Id preenchido.</span>");
					}
				$Id = $_GET["Id"];
				// Teste de preenchimento do parÃ¢metro Id
				if( $Id == "" ){
					exit("<span class=erro>PDE - ParÃ¢metro Id presente mas nÃ£o preenchido.</span>");
					}				
				// ConstrÃ³i o SQL para pesquisa do registro que tem este Id
				$strSQL = "SELECT * FROM " . $TABELA . " WHERE Id = " .  $Id;
				echo $strSQL . "<br>";
				// Abre ConexÃ£o
				include "connection.php";
				$comm = $conn->prepare($strSQL);
				$comm->execute();
				$row = $comm->fetch();
				$CAMPOS = $row;
				//print_r($CAMPOS);
				// Fecha ConexÃ£o
				include "connection_close.php";
			?>
			<form method="post" action="?action=editsave&CodUsr=1">
				<table>
				<?php
				foreach( $arr as $key => $valor ){
					$NOME = $valor->nome;
					$LABEL = u2iso($valor->label);
					$TAM = $valor->tam;
					$TAMTOT = $valor->tamtot;
					$TIPO = $valor->tipo;
					// Linha de um campo - INICIO
					echo "<tr><td><label>" . $LABEL . "</label></td><td>";
					$ID = "id=\"" . $NOME . "\" name=\"" . $NOME . "\" value=\"" . $CAMPOS[$NOME] . "\" ";
					// Decidir se coloca INPUT ou Textarea ou SELECT
					// Janela do campo bem menor que o comprimento total
					if( $TAMTOT > 2*$TAM ){
						$linhas = floor(intval($TAMTOT)/intval($TAM));
						echo "<textarea " . $ID . " rows=\"" . strval($linhas) ."\" cols=\"" . strval($TAM) . "\">" . $CAMPOS[$NOME] . "</textarea>";
						} else {
						// Tipo SELECT
						if( isset($valor->sele) != false ){
							$SELE = $valor->sele;
							echo "<select " . $ID . ">";
							echo "<option value=\"" . $CAMPOS[$NOME] . "\">" . $CAMPOS[$NOME] . "</option>";
							foreach ($SELE as $chave1 => $valor1) {
								echo "<option value=\"" . $valor1 . "\">" . $valor1 . "</option>";
								}
							echo "</select>";
							} else {							
							// NÃ£o sendo Textarea e nem Select ...
							echo "<input " . $ID . " type=\"" . $arrTIPOS[$TIPO] . "\" size=\"" . strval($TAM) . "\" maxlength=\"" . strval($TAMTOT) . "\">";
							}
						}
					echo "</td></tr>";
					// Linha de um campo - FIM
					}
				?>
					<tr><td colspan=2 align="center"><input type="submit" value="GRAVA"></td></tr>
				</table>
			</form>
			<?php					
				break;
			// AÃ§Ã£o de preparaÃ§Ã£o de  ediÃ§Ã£o de registros
			case "editsave":
				// Coleta dos campos do formulÃ¡rio
				echo "<table>";
				foreach($_POST as $key => $value) {
					echo "<tr><td>" . $key . "</td><td>" . $value . "</td><td>" . $arrNomes[$key]["tipo"] . "</td><td align=right>" . $arrNomes[$key]["tam"] . "</td></tr>";
					}
				echo "</table>";
				echo "<br>";				
				break;
			}
		?>
	</body>
</html>
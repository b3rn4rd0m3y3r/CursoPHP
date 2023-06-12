<html>
	<!-- Configurando o comportamento do parÃ¢metro CodUsr em relação à edição dos campos -->
	<?php
		include "Funcoes.php";
		header('Content-type: text/html; charset=UTF-8');
		if( isset($_GET["action"]) ){
			$action = $_GET["action"];
			} else {
			$action = "";
			}
		if( isset($_GET["CodUsr"]) ){
			$User = $_GET["CodUsr"];
			} else {
			$User = "0";
			}
	?>
	<head>
		<!-- Coleta dos campos da VIEW -->
		<title>PDE022a</title>
		<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1">
		<meta name="robots" content="noindex, nofollow" />
		<link rel="stylesheet" href="PDE01.css">
		<script src="BMyFrmwk.js"></script>
		<script type="text/javascript">
			var ob = new BMy();
			function envia(txt){
				var o = window.opener;
				var codFld = window.parent.document.getElementById("IdProd")
				codFld.value = txt;
				//alert(codFld);
				}
			function choose(){
				var o = window.opener; 
				console.log(o);
				var imgFld = eval("o."+(ob.getByQry('INPUT[Name=IdProd]')[0])); 
				imgFld.value = (ob.getById('escolhido')).value; 
				console.log(window.opener);
				setTimeout(fecha,1000);		
				}
			function fecha(){
				window.close();
				}
			// Eventos disparados ao final do carregamento da página
			document.addEventListener("DOMContentLoaded", function(e) {
			    var scs = document.querySelector("script");
			    scs.src = "";
			    scs.setAttribute("data-dtconfig","");
			    console.log(scs);
			});
		</script>
	</head>
	<body>
		<center>
		<h1 class="streito"><?php echo u2iso($TITULO); ?></h1>
		<h2 class="brd"><?php echo u2iso($SUBTITULO); ?> [<?php echo $TABELA; ?>]</h2>
		</center>
		<?php
		switch ($action){
			// Ação de preparação de  inclusão de registros
			/*
				Ação de pesquisa de acordo com um determinado parâmetro
			*/
			case "list":
				$PsqFieldName = $_POST["Botao"];
				$PsqFieldCont = $_POST[$_POST["Botao"]];
				// Constrói o SQL para pesquisa do registro que tem este Id
				$strSQL = "SELECT * FROM " . $TABELA . " WHERE Id > 0 ";
				$strSQL .= " AND " . $PsqFieldName . " LIKE '%" . $PsqFieldCont . "%'";
				// Abre Conexão
				include "connection.php";
				$comm = $conn->prepare($strSQL);
				$comm->execute();
				// Delimita a TABLE que vai exibir os registros
				echo "<table id=Resultset cellspacing=0 cellpadding=4 border=1>";
				echo "<thead>";
				foreach( $arr as $key => $valor ){
					$NOME = $valor->nome;
					$LABEL = $valor->label;
					$TIPO = $valor->tipo;
					echo "<th>" . $LABEL . "</th>";
					}
				echo "<th>INCLUIR</th>";
				echo "<th>ALTERAR</th>";
				echo "<th>APAGAR</th>";
				echo "</thead>";
				echo "<tbody>";
				// Lista os campos de um registro
				while( $row = $comm->fetch() ){
					echo "<tr>";
					foreach( $arr as $key => $valor ){
						$NOME = $valor->nome;
						$TIPO = $valor->tipo;
						$ALIN = "right";
						if( $TIPO == "C" || $TIPO == "D" ){
							$ALIN = "left";
							}
						echo "<td align=" . $ALIN . ">";
						if ($TIPO == "D" ){
							echo dtSepar($row[$NOME]);
							} else {
							echo "<a class=\"golink\" onclick=\"envia('" . $row[$NOME] . "')\">" . $row[$NOME] . "</a>";
							}
						
						echo "</td>";
						}
					// Campos de controle de acordo com as permissões
					if( $PERMISSOES->add == "S" ){
						echo "<td align=center><a class=blue href=\"?action=add&DTD=" . $CONFIG . "&CodUsr=" . $User . "\" target=\"NewReg\">&#10009;</a></td>";
						} else {
						echo "<td>&nbsp;</td>";
						}
					if( $PERMISSOES->edit == "S" ){
						echo "<td align=center><a href=\"?action=edit&DTD=" . $CONFIG . "&Id=" . $row["Id"] . "&CodUsr=" . $User . "\" target=\"OldReg\">&#9997;</a></td>";
						} else {
						echo "<td>&nbsp;</td>";
						}
					if( $PERMISSOES->dele == "S" ){
						echo "<td align=center><a href=\"?action=dele&DTD=" . $CONFIG . "&Id=" . $row["Id"] . "&CodUsr=" . $User . "\" target=\"DelReg\">&#10060;</a></td>";
						} else {
						echo "<td>&nbsp;</td>";
						}
					echo "</tr>";
					}
				echo "</tbody>";
				echo "<table>";
				$CAMPOS = $row;
				// Fecha Conexão
				include "connection_close.php";
				echo $BACK_MAIN_SCREEN;
				break;
			default:
		?>
			<center>
				<h2 class="subt">P E S Q U I S A S</h2>
				<form method="post" action="?action=list&DTD=<?php echo $CONFIG; ?>&CodUsr=<?php echo $User; ?>">
					<div id="container">
					<table class=entry>
						<?php
						foreach ($arr as $chave => $valor) {
							$NOME = $valor->nome;
							$LABEL = $valor->label;
							$TAM = $valor->tam;
							$TAMTOT = $valor->tamtot;
							$TIPO = $valor->tipo;
							$CODUSER = $valor->coduser;
							echo "<tr><td><label>" . $LABEL . "</label></td><td>";
							// Teste de igualdade do CodUsr do campo
							$ID = " id=\"" . $NOME . "\" name=\"" . $NOME . "\" ";
							if( $User != $CODUSER ){
								$ID .= "readonly ";
								}
							// Decidir se coloca INPUT ou SELECT
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
							echo "</td><td>";
							echo "<input class=qry type=submit name=Botao value=\"" . $NOME . "\">";
							echo "</td></tr>";
							}
						?>
					</table>
					</div>
				</form>
			</center>
		<?php
			}
		?>
	</body>
</html>
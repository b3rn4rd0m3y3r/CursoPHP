<?php
	include "mysqlcon.php";

	$Id = $_GET["Id"];
	echo "(1) Mostra os nomes dos campos postados<br>";
	foreach( $_POST as $key=>$value ){
		echo $key . "<br>";
		}
	echo "(2) Monta a lista de atualização para o SQL";
	$frase = "SET ";
	foreach( $_POST as $key=>$value ){
		$frase .= $key . " = '" . $value . "',";
		}
	$frase = substr($frase, 0, strlen($frase) - 1);
	echo "<br>" . $frase;
	echo "<br>(3) Monta o SQL de atualização para a tabela";
	$sql = "UPDATE tabela " . $frase . " WHERE Id = " . $Id;
	echo "<br>" . $sql;
	try {
		if( ($stmt = $conn->exec($sql)) ){
			echo "<br>Gravou<br>";
			} else {
			echo "Erro Sql<br>";
			}
		} catch(PDOException $e) {
		echo '<br><br><b>ERRO</b>: ' . $e->getMessage();
		}		
	?>
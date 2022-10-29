<?php
	include "mysqlcon.php";
	// Constrói o SQL, ligando logicamente ao parâmetro
	$sql = "SELECT * FROM banco.tabela ";
	try{
		$stmt = $conn->prepare($sql);
		$res = $stmt->execute();
		while( ($row = $stmt->fetch()) ){
			echo "<br>" . $row["Id"] . " - " . $row["Campo1"] . " - " . $row["Campo2"] ;
			}
		} catch (PDOException $e) {
		echo $e->getMessage();
		}
?>
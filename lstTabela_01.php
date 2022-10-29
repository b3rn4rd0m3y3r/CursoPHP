<?php
	include "mysqlcon.php";
	// Constrói o SQL, ligando logicamente ao parâmetro
	$sql = "SELECT * FROM banco.tabela ";
	try{
		$stmt = $conn->exec($sql);
		var_dump($stmt);
		} catch (PDOException $e) {
		echo $e->getMessage();
		}
?>
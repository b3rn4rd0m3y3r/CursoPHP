<?php
	include "mysqlcon.php";
	// Constr�i o SQL, ligando logicamente ao par�metro
	$sql = "SELECT * FROM banco.tabela ";
	try{
		$stmt = $conn->exec($sql);
		var_dump($stmt);
		} catch (PDOException $e) {
		echo $e->getMessage();
		}
?>
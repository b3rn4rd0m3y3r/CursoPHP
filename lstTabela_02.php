<?php
	include "mysqlcon.php";
	// Constr�i o SQL, ligando logicamente ao par�metro
	$sql = "SELECT * FROM banco.tabela ";
	try{
		$stmt = $conn->prepare($sql);
		$res = $stmt->execute();
		while( ($row = $stmt->fetch()) ){
			echo "<br>" . $row["Id"];
			}
		} catch (PDOException $e) {
		echo $e->getMessage();
		}
?>
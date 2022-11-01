<?php
	include "mysqlcon.php";
	// Constrói o SQL, ligando logicamente ao parâmetro
	$sql = "SELECT * FROM banco.tabela ";
	try{
		$stmt = $conn->prepare($sql);
		$res = $stmt->execute();
		echo "<table border=1 cellspacing=0 cellpadding=4>";
		echo "<tr><th>Id<th>Campo1<th>Campo2<th>Campo3<th>Edit</tr>";
		while( ($row = $stmt->fetch()) ){
			echo "<tr><td>" . $row["Id"] . "</td><td>" . $row["Campo1"] . "</td><td>" . $row["Campo2"] . "</td><td>" . $row["Campo3"] . "</td><td><a href=\"getCampos03.php?Id=" . $row["Id"] . "\">Editar</a></td></tr>";
			}
		echo "</table>";
		} catch (PDOException $e) {
		echo $e->getMessage();
		}
?>
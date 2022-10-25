<?php
include "mysqlcon.php";
// Chamada getCampos03.php?Id=9999
// Armazena a cole��o de par�metros GET
$arr = $_GET;
var_dump($arr);
echo "<br>";
// Escaneia a cole��o de par�metros GET
foreach( $arr as $key=>$valor ){
	echo "Param: " . $key . " - " . $arr[$key] . "<br>";
	}
// Obt�m, especificamente o Id
$Id = $arr["Id"];
echo "<b>Id: </b>" . $Id;
// Constr�i o array de par�metros de pesquisa
$data = [
    'id' => $Id
];
// Constr�i o SQL, ligando logicamente ao par�metro
// de espera :id
$sql = "SELECT * FROM banco.tabela ";
$sql .= " WHERE Id = :id ";
echo "<br>" . $sql;
$stmt = $conn->prepare($sql);
echo "<br>";
var_dump($stmt);
// Executa a senten�a, ligando aos
// par�metros do array $data
$res = $stmt->execute($data);
echo "<br>";
var_dump($res);
// Faz uma leitura
$row = $stmt->fetch();
// Acrescentamos os atributos name nos campos INPUT
echo "<br>________________________________<br>";
echo "<h1>REGISTRO No. " . $Id . "</h1>";
echo "<form method=\"post\" action=\"setCampos02.php?Id=" . $Id . "\">";
echo "<label>Campo 1:</label><input name=\"campo1\" type=text value=\"" . $row["Campo1"] . "\"><br>";
echo "<label>Campo 2:</label><input name=\"campo2\" type=text value=\"" . $row["Campo2"] . "\"><br>";
echo "<label>Campo 3:</label><input name=\"campo3\" type=text value=\"" . $row["Campo3"] . "\"><br>";
echo "<input type=submit value=\"Atualizar\"><br>";
echo "</form>";
?>
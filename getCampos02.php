<?php
include "mysqlcon.php";
// Chamada getCampos02.php?Id=9999
// Armazena a coleção de parâmetros GET
$arr = $_GET;
var_dump($arr);
echo "<br>";
// Escaneia a coleção de parâmetros GET
foreach( $arr as $key=>$valor ){
	echo "Param: " . $key . " - " . $arr[$key] . "<br>";
	}
// Obtém, especificamente o Id
$Id = $arr["Id"];
echo "<b>Id: </b>" . $Id;
// Constrói o array de parâmetros de pesquisa
$data = [
    'id' => $Id
];
// Constrói o SQL, ligando logicamente ao parâmetro
// de espera :id
$sql = "SELECT * FROM banco.tabela ";
$sql .= " WHERE Id = :id ";
echo "<br>" . $sql;
$stmt = $conn->prepare($sql);
echo "<br>";
var_dump($stmt);
// Executa a sentença, ligando aos
// parâmetros do array $data
$res = $stmt->execute($data);
echo "<br>";
var_dump($res);
// Faz uma leitura
$row = $stmt->fetch();
echo "<br>________________________________<br>";
print_r($row["Campo2"]);
?>
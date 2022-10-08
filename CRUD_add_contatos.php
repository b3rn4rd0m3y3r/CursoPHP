<?php
	include "mysqlcon.php";
	header('Content-Type: text/html; charset=iso-8859-1');
	echo "Incluimos a conexão<br>";
	var_dump($conn);
	// Parâmetros e frase SQL
	$nome = "Sicrano";
	$email = "SICRANO@empresa.com.br";
	$cpf = "2222222288";
	$data = [
	    'nome' => $nome,
	    'email' => $email,
	    'cpf' => $cpf
	];
	$sql = "INSERT INTO Contatos (Id, NomeCt, EmailCt, CpfCt) VALUES (NULL, :nome, :email, :cpf)";
	$stmt= $conn->prepare($sql);
	$stmt->execute($data);
?>
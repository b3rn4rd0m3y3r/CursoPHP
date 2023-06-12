<?php
		try {
		$conn = new PDO('sqlite:Banco.db');
		$conn->setAttribute(PDO::ATTR_ERRMODE, $conn::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
		echo $e->getMessage();
		}
?>
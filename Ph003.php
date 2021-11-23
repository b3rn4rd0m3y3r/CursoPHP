<html>
	<head>
			<title>Ph003</title>
			<link rel="shortcut icon" href="favicon.ico" />
			<meta charset="iso-8859-1"/>
			<meta name="author" content="Bernardo Meyer">
			<meta name="description" content="PHP básico para mostrar o local de injeção do código.">
			<meta name="keywords" content="sites, web, desenvolvimento, HTML5">
	</head>
	<body>
		<?php
			echo "<b>Caminho da script corrente (URL):</b>"."<br>";
			echo $_SERVER["SCRIPT_FILENAME"]."<br>";
			$str = $_SERVER["SCRIPT_FILENAME"];
			$arr = explode('\\', $str);
			var_dump($arr);
			echo "<br><b>Nome:</b> " . array_pop($arr) . "<br>";
			var_dump($arr);
		?>
	</body>
</html>


<html>
	<head>
			<title>Ph002</title>
			<link rel="shortcut icon" href="favicon.ico" />
			<meta charset="iso-8859-1"/>
			<meta name="author" content="Bernardo Meyer">
			<meta name="description" content="PHP básico para mostrar o local de injeção do código.">
			<meta name="keywords" content="sites, web, desenvolvimento, HTML5">
	</head>
	<body>
		<?php
			echo "Nome da script corrente:\n";
			echo $_SERVER["SCRIPT_FILENAME"];
		?>
	</body>
</html>


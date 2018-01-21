<?php require 'config.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Calendário</title>

	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<?php
		$calendario = new Calendario();
		$calendario->mostrarAno();
	?>
</body>
</html>
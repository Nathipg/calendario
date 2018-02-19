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
	<div id="cabecalhoCalendario">
		<span onclick="alterarAno(-1)"> < </span>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<span id="anoCalendario"><?= date('Y'); ?></span>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<span onclick="alterarAno(1)"> > </span>
	</div>
	<?php
		$calendario = new Calendario();
		$calendario->mostrarAno();
	?>
	<script src="js/script.js"></script>
</body>
</html>
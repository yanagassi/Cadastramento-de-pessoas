<?php 
	require_once('class/usuario.class.php');
	$usuarioDC = new usuario;
	$usuarioDC->protege();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<div class="menu">
	<a id="logo" href="#">Sistema</a>
	<a id="registro" href="registro.php">Registrar</a>
	<a id="sair" href="sair.php">Sair</a>
</div>
	<div style="padding: 10px; width: 500px; position: absolute;top:-3px; left: 50%; margin-left: -250px;">
		<form action="busca.php" method="GET">
		<input id="busca" type="text" name="palavra"  placeholder="Buscar Pessoa">
		<input type="submit" id="bnt_busca" value="Buscar"">
	</form>
	</div>
</body>
</html>
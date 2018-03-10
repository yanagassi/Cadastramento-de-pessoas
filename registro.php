<?php
	require_once('class/usuario.class.php');
	$usuarioDC = new usuario;
	$usuarioDC->protege();

?>
<!DOCTYPE html>
<html>
<head>
	<title>regitro</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<div class="menu">
	<a id="logo" href="#">Sistema</a>
	<a id="voltar" href="index.php">Voltar</a>
	<a id="sair" href="sair.php">Sair</a>
</div>

	<div style="position: absolute; left: 50%; width: 500px; margin-left: -250px; top: 80px;">
		<style type="text/css">
			input{
				margin:2px;
			}
		</style>
		<form action="./registrar.php" enctype="multipart/form-data"  method="POST" style="display: inline-grid;">
			<input type="text" name="nome" placeholder="Nome">
			<input type="text" name="nome_guerra" placeholder="Nome De Guerra">
			<input type="text" name="nascimento" placeholder="Data de Nascimento">
			<input type="text" name="idt" placeholder="Identidade Militar">
			<input type="text" name="bateria" placeholder="Bateria">
			<input type="text" name="telefone" placeholder="Telefone">
			<input type="text" name="numero" placeholder="Numero">
			<input type="text" name="endereco" placeholder="Endereço">
			<input type="text" name="bairro" placeholder="Bairro">
			<input type="text" name="cidade" placeholder="Cidade">
			<input type="text" name="uf" placeholder="UF">
			<input type="text" name="cep" placeholder="CEP">
			<input type="text" name="pais" placeholder="País">
			<input type="file" id="foto" name="foto">
			<input type="submit"  value="Registar">
		</form>
	</div>
</body>
</html>
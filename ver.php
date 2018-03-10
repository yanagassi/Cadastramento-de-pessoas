<?php 	
 	require_once('./class/sistem.class.php');
 	$dado = new dados;

 	if (empty($_GET['id'])) {
 		header("Location: buscar.php");
 	}
 	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>CAM - VIRTUAL</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<div class="menu">
		<a id="logo" href="#">Sistema</a>
		<a id="voltar" href="index.php">Voltar</a>
		<a id="sair" href="sair.php">Sair</a>
	</div>

	<div style="padding: 9px; width: 500px; position: absolute;top:-3px; left: 50%; margin-left: -250px;">
		<form action="busca.php" method="GET">
		<input id="busca" style="width: 350px;" type="text" name="palavra"  placeholder="Buscar Pessoa">
		<input type="submit"  id="bnt_busca" value="Buscar"">
	</form>
	</div>
	<div style="position: absolute; left: 50%; width: 500px; margin-left: -250px; ">
		<style type="text/css">
			input{
				margin:2px;
			}
		</style>
	<div style="margin-left: 10px; margin-top: 80px;display: grid;">
		<a>Nome: <?php $dado->getDados('nome',$id);?></a> 
		<a>Nome de Guerra: <b><?php $dado->getDados('nome_guerra',$id);  ?></b></a>
		<a>Nascimento: <?php $dado->getDados('nascimento',$id); ?>
		<a>Nº Identidade: <?php $dado->getDados('idt',$id); ?></a>
		<a>Bateria: <?php $dado->getDados('bateria',$id); ?></a>
		<a>Telefone: <?php $dado->getDados('telefone',$id); ?></a>
		<a>Numero: <?php $dado->getDados('numero',$id); ?></a>
		<a>Endereco: <?php $dado->getDados('endereco',$id); ?></a>
		<a>Bairro: <?php $dado->getDados('bairro',$id); ?> </a>
		<a>Cidade: <?php $dado->getDados('cidade',$id); ?></a>
		<a>UF: <?php $dado->getDados('UF',$id); ?></a>
		<a>CEP: <?php $dado->getDados('CEP',$id); ?></a>
		<a>País: <?php $dado->getDados('pais',$id); ?></a>
		<!--<img src="fotos/<?php $dado->getDados('foto',$id); ?>">-->

	</div>
</body>
</html>
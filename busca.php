<?php 

	if (empty($_GET['palavra']) || $_GET['palavra'] == ' ') {
		header("Location: index.php");
	}
	require_once('class/sistem.class.php');
 	$dado = new dados;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Buscar <?php if(!empty($_GET['palavra'])){ print('por '); print($_GET['palavra']);} ?></title>
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
	<style type="text/css">
		input{

			padding: 5px;
		}
		#busca{
			width: 300px
		}

		#resultados{
			position: absolute;
			top:150px;
		}

	</style>
	<div style="padding: 10px; width: 500px; position: absolute;top:-3px; left: 50%; margin-left: -250px;">
		<form action="busca.php" method="GET">
		<input id="busca" style="width: 350px;" type="text" name="palavra"  placeholder="Buscar Pessoa">
		<input type="submit"  id="bnt_busca" value="Buscar"">
	</form>
	</div>
	<div style="margin-top: 50px; margin-left: 50px;">
			<?php 
			if(!empty($_GET['palavra'])){
	 			$dado->busca($_GET['palavra']);
	 		}
	 	?>
	</div>
	<?php $dado->resultados()?>
</body>
</html>
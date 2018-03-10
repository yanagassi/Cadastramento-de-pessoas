<?php 
	if (empty($_POST['usuario']) || empty($_POST['senha'])) {
		header("Location: login.php");
	}
	require_once('class/usuario.class.php');
	$usuario = new usuario;
	$usuario->login($_POST['usuario'] , $_POST['senha']);
	header("Location: index.php");
 ?>
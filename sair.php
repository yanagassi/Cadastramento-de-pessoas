<?php 
require_once('class/usuario.class.php');
	$usuario = new usuario;
	$usuario->sair($_SESSION['token']);
 ?>
<?php
	require_once('class/usuario.class.php');
	$usuarioDC = new usuario;
	$usuarioDC->protege();

	$nome= $_POST['nome'];
	$nome_guerra = $_POST['nome_guerra'];
	$nascimento = $_POST['nascimento'];
	$idt = $_POST['idt'];
	$bateria = $_POST['bateria'];
	$telefone = $_POST['Telefone'];
	$numero = $_POST['numero'];
	$endereco = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
	$cep = $_POST['cep'];
	$pais = $_POST['pais'];
	$foto = $_FILES["foto"];
	require_once('class/sistem.class.php');
	$dados = new dados;
	$dados->envia($nome,$nome_guerra,$nascimento,$idt,$bateria,$telefone,$numero,$endereco,$bairro,$cidade,$uf,$cep,$pais,$foto);
	header("Location: index.php");
?>

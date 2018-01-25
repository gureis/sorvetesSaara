<?php

	session_start();

	require_once('db.class.php');

	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$telefone = $_POST['telefone'];
	$endereco = $_POST['endereco'];
	$cidade = $_POST['cidade'];
	$cep = $_POST['cep'];
	$estado = $_POST['estado'];
	$id = $_SESSION['id'];

	$sql = "UPDATE usuarios SET nome='$nome', sobrenome='$sobrenome', telefone='$telefone', endereco='$endereco', cidade='$cidade', cep='$cep', estado='$estado', id WHERE id=$id";

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	if(mysqli_query($link, $sql)){
    echo "Atualização de cadastro concluída com sucesso!.";
	} else {
    echo "ERRO: Não foi possível executar $sql. " . mysqli_error($link);
	}

mysqli_close($link);

?>
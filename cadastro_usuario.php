<?php
	//requer a classe de conexão
	require_once('db.class.php');

	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$sexo = $_POST['sexo'];
	$cpf =  $_POST['cpf'];
	$rg = $_POST['rg'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);
	$telefone = $_POST['telefone'];
	$nascimento = $_POST['nascimento'];
	$endereco = $_POST['endereco'];
	$cidade = $_POST['cidade'];
	$cep = $_POST['cep'];
	$estado = $_POST['estado'];

	$objDb = new db(); //recebe o db
	$link = $objDb->conecta_mysql(); // função de conexão bd

	$sql = "INSERT INTO usuarios(nome, sobrenome, sexo, cpf, rg, email, senha, telefone, nascimento, endereco, cidade, cep, estado) values ('$nome', '$sobrenome', '$sexo', '$cpf', '$rg', '$email', '$senha', '$telefone', '$nascimento', '$endereco', '$cidade', '$cep', '$estado')";

	//Exec query
	if (mysqli_query($link, $sql)){
		echo 'Usuário registrado com sucesso!';
	}else{
		echo 'Não foi possível registrar o usuário.';
	}

 ?>
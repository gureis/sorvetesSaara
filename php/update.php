<?php

	session_start();

	require_once('db.class.php');

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	$nome = $request->nome;
	$sobrenome = $request->sobrenome;
	$telefone = $request->telefone;
	$endereco = $request->endereco;
	$cidade = $request->cidade;
	$cep = $request->cep;
	$estado = $request->estado;
	$email = $request->email;

	$sql = "UPDATE usuarios SET nome='$nome', sobrenome='$sobrenome', telefone='$telefone', endereco='$endereco', cidade='$cidade', cep='$cep', estado='$estado' WHERE email=$email";

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	if(mysqli_query($link, $sql)){
    echo "Atualização de cadastro concluída com sucesso!.";
	} else {
    echo "ERRO: Não foi possível executar $sql. " . mysqli_error($link);
	}

mysqli_close($link);

?>
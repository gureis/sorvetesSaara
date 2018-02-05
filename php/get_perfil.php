<?php
	require_once('db.class.php');

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	
	$email = $request->login;
	$senha = $request->senha;

	$objDb = new db(); //recebe o db
	$link = $objDb->conecta_mysql(); // função de conexão bd

	$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

	$res = mysqli_query($link, $sql);

	if($res) {
		$user = mysqli_fetch_array($res);
		$user_data = [
			"nome" => $user['nome'],
			"sobrenome" => $user['sobrenome'],
			"email" => $user['email'],
			"sexo" => $user['sexo'],
			"senha" => $user['senha'],
			"cpf" => $user['cpf'],
			"rg" => $user['rg'],
			"cidade" => $user['cidade'],
			"cep" => $user['cep'],
			"estado" => $user['estado'],
			"nascimento" => $user['nascimento'],
			"telefone" => $user['telefone'],
			"endereco" => $user['endereco']
		];
		echo json_encode($user_data);
	} else {
		echo "Erro na consulta das infos.";
	}
?>
<?php
	require_once('db.class.php');

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	$email= request->login;

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$sql = "SELECT * FROM usuarios	WHERE email = '$email'";

	$res = mysqli_query($link, $sql);

	if($res) {
		$user = mysqli_fetch_array($res);

		$user_data = [
			"nome" => $user['nome'],
			"sobrenome" => $user['sobrenome'],
			"telefone" => $user['telefone'],
			"endereco" => $user['endereco'],
			"cidade" => $user['cidade'],
			"cep" => $user['cep'],
			"estado" => $user['estado'],
			"sexo" => $user['sexo'],
			"email" => $user['email'],
			"nascimento" => $user['nascimento'],
			"senha" => $user['senha'],
			"cpf" => $user['cpf'],
			"rg" => $user['rg']
		];

		echo json_encode($user_data);
	} else {
		echo "Erro na consulta das infos.";
	}
?>
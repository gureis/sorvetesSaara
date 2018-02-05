<?php
	session_start();

<<<<<<< HEAD
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	
	$email = $request->login;
	$senha = $request->senha;

	$objDb = new db(); //recebe o db
	$link = $objDb->conecta_mysql(); // função de conexão bd
=======
	require_once('db.class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	$email = $request->request;
>>>>>>> 4b75b51b71add270730c51d14d3c901f554721f2

	$sql = "SELECT * FROM usuarios WHERE email = '$email'";

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
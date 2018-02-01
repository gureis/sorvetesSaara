<?php
	require_once('db.class.php');

	$email = $_SESSION['email'];

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$sql = "SELECT nome, sobrenome, sexo, cpf, rg, email, telefone, nascimento, endereco, cidade, cep, estado FROM usuarios	WHERE email = '$email'";

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
			"estado" => $user['estado']
			"sexo" => $user['sexo'],
			"email" => $user['email'],
			"nascimento" => $user['nascimento'],
		];

		echo json_encode($user_data);
	} else {
		echo "Erro na consulta das infos.";
	}
?>
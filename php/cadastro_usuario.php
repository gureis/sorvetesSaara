<?php
	//requer a classe de conexão
	require_once('db.class.php');

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	$nome = $request->nome;
	$sobrenome = $request->sobrenome;
	$sexo = $request->sexo;
	$cpf =  $request->cpf;
	$rg = $request->rg;
	$email = $request->email;
	$senha = md5($request->senha);
	$nascimento = $request->nascimento;
	$endereco = $request->endereco;
	$cidade = $request->cidade;
	$cep = $request->cep;
	$estado = $request->estado;
	$telefone = $request->telefone;

	$objDb = new db(); //recebe o db
	$link = $objDb->conecta_mysql(); // função de conexão bd

	$email_existe = false;
	$cpf_existe = false;
	$rg_existe = false;

	$sql = "SELECT email FROM usuarios WHERE email = '$email'";
	$res = mysqli_query($link, $sql);
	if($res) {
		$user_data = mysqli_fetch_array($res);
		if(isset($user_data['email'])) {
			$email_existe = true;
		}
	}

	$sql = "SELECT cpf FROM usuarios WHERE cpf = '$cpf'";
	$res = mysqli_query($link, $sql);
	if($res) {
		$user_data = mysqli_fetch_array($res);
		if(isset($user_data['cpf'])) {
			$cpf_existe = true;
		}
	}

	$sql = "SELECT rg FROM usuarios WHERE rg = '$rg'";
	$res = mysqli_query($link, $sql);
	if($res) {
		$user_data = mysqli_fetch_array($res);
		if(isset($user_data['rg'])) {
			$rg_existe = true;
		}
	}


	if($email_existe || $cpf_existe || $rg_existe) {
		$return_get = '';

		if($email_existe)
			$return_get .= "Email existente ";

		if($cpf_existe)
			$return_get .= "CPF existente ";

		if($rg_existe)
			$return_get .= "RG existente ";
	}

	$nascimento= date('y/m/d', strtotime($nascimento));

	$sql = "INSERT INTO usuarios(nome, sobrenome, sexo, cpf, rg, email, senha, telefone, nascimento, endereco, cidade, cep, estado)	VALUES ('$nome', '$sobrenome', '$sexo', '$cpf', '$rg', '$email', '$senha', '$telefone', '$nascimento', '$endereco', '$cidade', '$cep', '$estado')";

	//Exec query
	if (mysqli_query($link, $sql)){
		$user = [
			"status" => "ok",
			"login" => $email,
			"senha" => $senha
		];
		echo json_encode($user);
	}else{
		$erro = [
			"status" => $return_get
		];
		echo json_encode($erro);
	}
 ?>
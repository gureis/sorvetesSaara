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
			$return_get .= "err_email=1&";

		if($cpf_existe)
			$return_get .= "err_cpf=1&";

		if($rg_existe)
			$return_get .= "err_rg=1";

		header("Location: index.html?".$return_get);
	}

	$sql = "INSERT INTO usuarios(nome, sobrenome, sexo, cpf, rg, email, senha, telefone, nascimento, endereco, cidade, cep, estado) VALUES ('$nome', '$sobrenome', '$sexo', '$cpf', '$rg', '$email', '$senha', '$telefone', '$nascimento', '$endereco', '$cidade', '$cep', '$estado')";

	//Exec query
	if (mysqli_query($link, $sql)){
		echo 'Usuário registrado com sucesso!';
	}else{
		echo 'Não foi possível registrar o usuário.';
	}

 ?>
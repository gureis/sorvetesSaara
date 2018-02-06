<?php
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
	$senha = $request->senha;
	$sexo = $request->sexo;
	$resposta = [
		'senha' => "",
		'status' => ""
	];

	if($senha=="")
	{
		$sql = "UPDATE usuarios SET nome='$nome', sobrenome='$sobrenome', telefone='$telefone', endereco='$endereco', cidade='$cidade', cep='$cep', estado='$estado', sexo='$sexo' WHERE email='$email'";
	}else{
		$senha = md5($senha);
		$sql = "UPDATE usuarios SET nome='$nome', sobrenome='$sobrenome', telefone='$telefone', endereco='$endereco', cidade='$cidade', cep='$cep', estado='$estado', senha='$senha', sexo='$sexo' WHERE email='$email'";		
	}

	$objDb = new db();
	$link = $objDb->conecta_mysql();


	if(mysqli_query($link, $sql)){
		if($senha != "")
			$resposta['senha'] = $senha;
			$resposta['status'] = "ok";
    	
	} else {
		$resposta['status'] = "Erro ao atualizar informações";
	}
	
	echo json_encode($resposta);

	mysqli_close($link);

?>

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
<<<<<<< HEAD
	$resposta;
=======
	$resposta = [
		'senha',
		'status'
	];
>>>>>>> 5654253399a04789dbe32b63ae25a4ccc23317c1

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
<<<<<<< HEAD
		if($senha != ""){
			$resposta['senha'] = $senha);
			$resposta['status'] = "ok";
		}
	} else {
		$resposta['status'] = "Erro ao atualizar informações");
=======
		if($senha != "")
			$resposta['senha'] = $senha;
		$resposta['status'] = "Alterações realizadas com sucesso";
    	
	} else {
		$resposta['status'] = "Erro ao atualizar informações";
>>>>>>> 5654253399a04789dbe32b63ae25a4ccc23317c1
	}
	
	echo json_encode($resposta);

<<<<<<< HEAD
=======
	echo json_encode($resposta);

>>>>>>> 5654253399a04789dbe32b63ae25a4ccc23317c1
	mysqli_close($link);

?>

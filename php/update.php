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
	    $resposta = [
	    	'senha' => $senha,
	    	'status' => "Alterações realizadas com sucesso!",
	    ];
    	echo json_encode($resposta);
	} else {
    	echo "ERRO: Não foi possível executar $sql. " .mysqli_error($link);
	}

mysqli_close($link);

?>

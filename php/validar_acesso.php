<?php
	session_start();

	require_once("db.class.php");

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	$email = $request->login;
	$senha = md5($request->senha);

	$sql = "SELECT email, nome FROM usuarios WHERE email = '$email' AND senha = '$senha'";

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$res = mysqli_query($link, $sql);

	if ($res){
		$dados_usuario = mysqli_fetch_array($res);
		if(isset($dados_usuario['email'])) {
			$_SESSION['email'] = $dados_usuario['email'];
			$user = [
				"status" => "Ok",
				"login" => $dados_usuario['email'],
				"nome" => $dados_usuario['nome'],
				"senha" => $senha
			];
			echo json_encode($user);
		} else {
			$user = [
				"status" => "Dados incorretos"
			];
			echo json_encode($user);
		}
	} else {
		echo 'Erro na execução da consulta, favor entrar em contato com o admin do site!';
	}
?>
<?php
	session_start();

	require_once("db.class.php");

	$email = $_POST['email'];
	$senha = md5($_POST['senha']);

	$sql = "SELECT email, senha FROM usuarios WHERE email = '$email' AND senha = '$senha'";

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$res = mysqli_query($link, $sql);

	if ($res){
		$dados_usuario = mysqli_fetch_array($res);
		if(isset($dados_usuario['email'])) {
			$_SESSION['email'] = $dados_usuario['email'];
			header("location: index.html?acerto=1");
		} else {
			header("location: index.html?erro=1");
		}
	} else {
		echo 'Erro na execução da consulta, favor entrar em contato com o admin do site!';
	}
?>
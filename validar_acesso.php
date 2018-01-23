<?php

	require_once('db.class.php');

	$usuario = $_POST['email'];
	$senha = $_POST['senha'];

	$sql = " SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' ";

	$objDb = new db(); //recebe o db
	$link = $objDb->conecta_mysql(); // função de conexão bd

	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){
		$dados_usuario = mysqli_fetch_array($resultado_id);

		if(issets($dados_usuario['usuario'])){
			echo 'Usuário existe';
		}else{
			header('location: index.html?erro=1');
		}
	}else{
		echo 'Erro na execução da consulta, favor entrar em contato com o admin do site!'
	}

?>
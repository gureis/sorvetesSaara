<?php
	session_start();

	if(!isset($_SESSION['email'])) {
		header("Location: index.html?erro=3");
	}

	require_once('db.class.php');

	$email = $_SESSION['email'];

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$sql = "SELECT nome, sobrenome, sexo, cpf, rg, email, telefone, nascimento, endereco, cidade, cep, estado FROM usuarios	WHERE email = '$email'";

	$res = mysqli_query($link, $sql);

	if($res) {
		$user_data = mysqli_fetch_array($res);
		echo "<p>".$user_data['nome']."</p>";
		echo "<p>".$user_data['sobrenome']."</p>";
		echo "<p>".$user_data['sexo']."</p>";
		echo "<p>".$user_data['cpf']."</p>";
		echo "<p>".$user_data['rg']."</p>";
		echo "<p>".$user_data['email']."</p>";
		echo "<p>".$user_data['telefone']."</p>";
		echo "<p>".date("d/m/y", strtotime($user_data['nascimento']))."</p>";
		echo "<p>".$user_data['endereco']."</p>";
		echo "<p>".$user_data['cidade']."</p>";
		echo "<p>".$user_data['cep']."</p>";
		echo "<p>".$user_data['estado']."</p>";
	} else {
		echo "Erro na consulta das infos.";
	}
?>
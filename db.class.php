<?php

	class db {
		private $host = 'localhost';

		private $usuario = 'root';

		private $senha = '';

		private $database = 'cadastro';

		public function conecta_mysql(){
			//conexão banco de datos
			$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

			// ajustar o charset
			mysqli_set_charset($con, 'utf8');

			// verificar erros
			if(mysqli_connect_errno()){
				echo 'Erro ao se conectar com o banco de dados: '.mysql_connect_error();
			}

			return $con;
		}
	}
?>
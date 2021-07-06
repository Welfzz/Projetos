<?php
	
	class Conexao{

		private $host = 'localhost';
		private $database_name = 'app_lista_tarefas';
		private $user = 'root';
		private $password = '';

		public function conectar(){

			try{

				$conexao = new PDO(
					"mysql:host=$this->host;dbname=$this->database_name",
					"$this->user",
					"$this->password"

				);

				return $conexao;

			}catch(PDOException $erro){

				echo '<p>' . $erro->getMessage() . '</p>';
			}
		}


	}
	

?>
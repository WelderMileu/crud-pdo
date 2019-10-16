<?php 

	class pessoas{

		private $pdo;

		// Contructor com conexão ao Banco de Dados
		public function __construct($host, $dbname, $user, $password){
			try {
				$this->pdo = new PDO("mysql:host=".$host.";dbname=".$dbname,$user, $password);
			} catch (PDOException $e) {
				echo "Erro ao tentar se conectar ao banco de dados".$e->getMessage();
			} catch (Exeption $e) {
				echo "Erro".$e->getMessage();
			}
		}

		// Mostrando dados na tela
		public function mostrarDados(){
			try{
				$most = array();
				$res = $this->pdo->query("SELECT * FROM pessoas ORDER BY id");
				$most = $res->fetchAll(PDO::FETCH_ASSOC);
				
				return $most;
			}catch(Exeption $e){
				echo "Erro: ".$e->getMessage();
			}
		}

		//Cadastrado de um novo usuario
		public function cadastrarUsuario($nome, $numero, $email){
			$cmd = $this->pdo->prepare("INSERT INTO pessoas (nome, numero, email) values (:n ,:nu, :e)");

			$cmd->bindValue(":n", $nome);
			$cmd->bindValue(":nu", $numero);
			$cmd->bindValue(":e", $email);
			$cmd->execute();

			return true;
		}
	}

 ?>
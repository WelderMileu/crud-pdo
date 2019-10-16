<?php

	// Chamando o nossa classe de conexão ao banco de dados.
	require_once "classe.pessoas.php";
	$pdo = new Pessoas("localhost","dados","root","");

	try {
		if(isset($_POST['nome'])){ // Erro na função ou no formulario de cadastro ao cadastrar usuarios no banco de dados.
			$nome = addslashes($_POST['nome']);
			$numero = addslashes($_POST['numero']);
			$email = addslashes($_POST['email']);

			// Função de cadastro da nossa classe.
			$pdo->cadastrarUsuario($nome, $numero, $email);
	}
	 } catch (PDOException $e) {
	 	echo "Erro PDO:".$e->getMessage();
	 } catch (Exeption $e) {
		echo "Erro: Generico".$e->getMessage();
	}
			 
?>
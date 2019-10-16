<?php 
	require_once "classe.pessoas.php";

	// Iniciando o nosso contructor
	$pdo = new Pessoas("localhost","dados","root","");
?>

<!DOCTYPE html>
<html leng="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CRUD PDO</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	</head>
	<body>
		<section class="container">
			
			<!-- Titulo do crud -->
			<div class="jumbotron mt-5 text-center text-uppercase">
				<h1>CRUD Usando PHP PDO</h1>
			</div>
			
			<!-- Cadastrando usuario junto ao banco dados -->
			<?php
				try {
					if(isset($_POST['nome'])){ // Não estou conseguindo cadastrar usuarios
						$nome = addslashes($_POST['nome']);
						$numero = addslashes($_POST['numero']);
						$email = addslashes($_POST['email']);

						$pdo->cadastrarUsuario($nome, $numero, $email);
					}
				 } catch (PDOException $e) {
				 	echo "Erro PDO:".$e->getMessage();
				 } catch (Exeption $e) {
				 	echo "Erro: ".$e->getMessage();
				 }
			 ?>
			
			<!-- Formulario do crud -->
			<form method="POST" class="form" action="">
				<h3 class="mb-2 text-uppercase"> Novo Usuario</h3>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<i class="fa fa-user-o"></i>
						</div>
						<input type="text" class="form-control" placeholder="Usuario" name="nome">
					</div>
				</div>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<i class="fa fa-user-o"></i>
						</div>
						<input type="text" class="form-control" placeholder="Telefone" name="numero">
					</div>
				</div>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<i class="fa fa-user-o"></i>
						</div>
						<input type="email" class="form-control" placeholder="exemple@email.com" name="email">
					</div>
				</div>
				<buttom class="btn btn-dark" type="submit"><i class="fa fa-sign-out"></i> Cadastrar</buttom>
			</form>

	
			<!-- Dados do Crud -->
			<table class="table table-hover mt-5">
				<tr class="bg-dark text-white">
					<td>ID</td>
					<td>Nome</td>
					<td>Telefone</td>
					<td>Email</td>
				</tr>
				<?php 
					// Exibindo dados na tela
					$dados = $pdo->mostrarDados();
					if (count($dados) > 0) {
						for ($i=0; $i < count($dados) ; $i++) { 
							echo "<tr>";
							foreach ($dados[$i] as $k => $v) {
								echo "<td>$v</td>";
							}
							echo "</tr>";
						}
					}else{
						echo "<p class='alert alert-primary text-center'>
								Nenhum registro foi encontrado
							</p>";
					}
				 ?>	
			</table>
		</section>
	</body>
</html>
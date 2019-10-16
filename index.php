<?php 
	// Chamando a nossa classe pessoas.
	require_once "classe.pessoas.php";

	// Iniciando o nosso contructor.
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

			<!-- Formulario do crud -->
			<form action="cadastrar.php" method="POST" class="mt-5" >
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
							<i class="fa fa-phone"></i>
						</div>
						<input type="text" class="form-control" placeholder="Telefone" name="numero">
					</div>
				</div>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<i class="fa fa-envelope"></i>
						</div>
						<input type="email" class="form-control" placeholder="exemple@email.com" name="email">
					</div>
				</div>
				<buttom class="btn btn-dark" type="submit"><i class="fa fa-sign-out"></i> Cadastrar</buttom>
			</form>

	
			<!-- Crud de dados vindo direto da nossa base de dados -->
			<table class="table table-hover mt-5 col-sm-10">
				<tr class="bg-dark text-white">
					<td><strong>ID</strong></td>
					<td><strong>Nome</strong></td>
					<td><strong>Telefone</strong></td>
					<td><strong>Email</strong></td>
				</tr>
				<?php 
					// Exibindo dados do banco de dados na tela
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
						echo "<p class='alert alert-primary text-center mt-3'>
								Nenhum registro foi encontrado
							</p>";
					}
				 ?>	
			</table>
		</section>

		<script type="text/javascript">
			// Criando um selector global.
			const $ = (e) => document.querySelector(e);

			// Função para testar a submição ao nosso formulario.
			$("form").addEventListener("submit",(e)=> {
				e.preventDefault();
				console.log("Funcionando");
			})
		</script>
	</body>
</html>
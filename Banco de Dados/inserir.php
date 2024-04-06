<!DOCTYPE html>
<html>
<head>
	<title>Cadastro Cliente</title>
</head>
<body>
<form method="POST">
	<fieldset>
		<legend>Cadastro Cliente</legend>
		<input type="text" name="nome" placeholder="Nome"><br>
		<input type="email" name="email" placeholder="email"><br>
		<input type="text" name="telefone" placeholder="telefone"><br>
		<input type="submit" value="Cadastrar">
	</fieldset>
</form>
<?php
	require_once 'conexao.php';

	if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone'])){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];

		try {
			$cliente = $pdo->prepare("INSERT INTO cliente set nome=?, email=?, telefone=?");
			$cliente->bindParam(1, $nome, PDO::PARAM_STR);
			$cliente->bindParam(2, $email, PDO::PARAM_STR);
			$cliente->bindParam(3, $telefone, PDO::PARAM_STR);
			if($cliente->execute()){
				echo "<script>alert('Cadastro realizado com sucesso!')</script>";
			}

		} catch (PDOException $e) {
			echo "Erro ao inserir: ".$e->getMessage();
		}
	}
?>

</body>
</html>







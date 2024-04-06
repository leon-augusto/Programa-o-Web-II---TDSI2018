<!DOCTYPE html>
<html>
<head>
	<title>Cadastro Aluno</title>
</head>
<body>
	<form method="POST">
		<fieldset>
			<legend>Cadastro Aluno:</legend>
			<input type="text" name="nome" placeholder="Nome">
			<input type="text" name="matricula" placeholder="matricula">
			<select name='curso'>
				<option value="TDSI">Desenvolvimento de Sistemas</option>
				<option value="Florestas">Florestas</option>
			</select>
			<input type="submit" value="Enviar">
		</fieldset>
	</form>
	<?php 

		require_once 'conexao.php';

		if(isset($_POST['nome'], $_POST['matricula'],$_POST['curso'])){
			$nome = $_POST['nome'];
			$matricula = $_POST['matricula'];
			$curso = $_POST['curso'];

			try{
				$aluno = $conexao->prepare("INSERT INTO aluno set nome=?, matricula=?, curso=?");
				$aluno->bindParam(1, $nome, PDO::PARAM_STR);
				$aluno->bindParam(2, $matricula, PDO::PARAM_STR);
				$aluno->bindParam(3, $curso, PDO::PARAM_STR);
				if($aluno->execute()){
					echo "<script>alert('Cadastro realizado com sucesso!')</script>";
					header("Location: lista_alunos.php");
				}

			}catch(PDOException $e){
				echo "Erro ao inserir: ".$e->getMessage();
			}
		}
		
		

		
	?>

</body>
</html>
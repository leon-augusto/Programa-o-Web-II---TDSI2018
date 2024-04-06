<?php

require_once('conexao.php');

if(isset($_GET['id_aluno'])){
	$id_aluno = $_GET['id_aluno'];

	try {
		$consulta = $conexao->prepare("select * from aluno where id_aluno=?");
		$consulta->bindParam(1, $id_aluno, PDO::PARAM_STR);
		$consulta->execute();

		//usando foreach
		$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
		foreach ($resultado as $linha) {
			$matricula = $linha['matricula'];
			$nome = $linha['nome'];
			$curso = $linha['curso'];
		}
		?>
		<form method="POST" action="update_aluno.php">
		<fieldset>
			<legend>Cadastro Aluno:</legend>
			<input type="text" name="nome" placeholder="Nome" value=<?php echo $nome; ?>>
			<input type="text" name="matricula" placeholder="matricula" value=<?php echo $matricula; ?>>
			<select name='curso'>
				<option value="TDSI" <?php echo ($curso=='TDSI') ? 'selected="selected"':''?>>Desenvolvimento de Sistemas</option>
				<option value="Florestas" <?php echo $curso=='Florestas' ? 'selected="selected"' : '' ?>>Florestas</option>
			</select>
			<input type="hidden" name="id_aluno" value=<?php echo $id_aluno;?>>
			<input type="submit" value="Enviar">
		</fieldset>
	</form>
		<?php

		//fecha a conexão
		$conexao = null;


	} catch (Exception $e) {
		echo "Erro ao consultar: ".$e->getMessage();
	}
}elseif (isset($_POST['id_aluno'])) {
	$id_aluno = $_POST['id_aluno'];
	$nome = $_POST['nome'];
	$matricula = $_POST['matricula'];
	$curso = $_POST['curso'];

	try {
		$update = $conexao->prepare("update aluno set nome=?, matricula=?, curso=? where id=?");
		$update->bindParam(1, $nome, PDO::PARAM_STR);
		$update->bindParam(2, $matricula, PDO::PARAM_STR);
		$update->bindParam(3, $curso, PDO::PARAM_STR);
		$update->bindParam(4, $id_aluno, PDO::PARAM_INT);
		if($update->execute()){
			echo "<script>alert('Alteração realizada com sucesso!')</script>";
					header("Location: lista_alunos.php");
		}else{
			//$conexao->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); // em caso da necessidade de confirgurar o servidor para reportar esse tipo de erro
			print_r($update->errorInfo());//informa em caso de erro
		}
	} catch (Exception $e) {
		echo "Erro ao alterar: ".$e->getMessage();
	}
}


?>
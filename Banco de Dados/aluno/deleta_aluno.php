<?php

require_once('conexao.php');

$id_aluno = $_GET['id_aluno'];


try {
	$deletar = $conexao->prepare("delete from aluno where id_aluno=?");
	$deletar->bindParam(1, $id_aluno, PDO::PARAM_INT); 
	if($deletar->execute()){
		echo "<script>alert('Deletado com sucesso!')</script>";
		header("Location: lista_alunos.php");
	}

} catch (Exception $e) {
	echo "Erro ao deletar: ".$e->getMessage();
}


?>
<?php

require_once('conexao.php');

try {
	$consulta = $conexao->query("select * from aluno");
	$consulta->execute();

	$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);//retornar todos dados da consulta
	echo "<a href='inserir_aluno.php'>Novo aluno</a>";

	echo "<table border='1'><tr><th>Nome</th><th>Matricula</th><th>curso</th><th>Ação</th></tr>";
	//usando foreach
	foreach ($resultado as $linha) {// percorre todas as linhas do resultado
		echo "<tr><td>".$linha['nome'].'</td><td>'.$linha['matricula'].'</td><td>'.$linha['curso']."</td><td><a href=deleta_aluno.php?id_aluno=".$linha['id_aluno'].'>Excluir</a></td></tr>';
	}

	echo "</table>";
	
	//fecha a conexão
	$conexao = null;


} catch (Exception $e) {
	echo "Erro ao consultar: ".$e->getMessage();
}


?>
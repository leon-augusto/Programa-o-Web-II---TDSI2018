<?php

require_once('conexao.php');

try {
	$consulta = $pdo->query("select * from cliente");
	$consulta->execute();

	$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);//consulta
	
	//usando foreach
	foreach ($resultado as $cliente) {
		echo "<br/><b>Nome:</b>".$cliente["nome"]." - <b>Senha:</b>".$cliente["email"];//FETCH_ASSOC
	}
	
	//fecha a conexão
	$pdo = null;


} catch (Exception $e) {
	echo "Erro ao consultar: ".$e->getMessage();
}


?>
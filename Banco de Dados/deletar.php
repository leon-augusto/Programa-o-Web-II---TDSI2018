<?php

require_once('conexao.php');

$id_cliente = 1;


try {
	$deletar = $pdo->prepare("delete from cliente where id_cliente=?");
	$deletar->bindParam(1, $id_usuario, PDO::PARAM_INT); 
	if($deletar->execute()){
		echo "<script>alert('Deletado com sucesso!')</script>";
	}

} catch (Exception $e) {
	echo "Erro ao deletar: ".$e->getMessage();
}


?>
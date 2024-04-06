<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form>
		<fieldset>
			<legend>Add Usuário</legend>
			<input type="text" name="usuario" placeholder="usuário"><br>
			<input type="submit" value="Adicionar">
		</fieldset>
	</form>
	<?php
		echo "<h2>Lista de usuários</h2>";
		if (isset($_GET['usuario'])) {
			$usuario = $_GET['usuario'];

			if(isset($_SESSION['usuarios'])){
				array_push($_SESSION['usuarios'], $usuario);
			}else{
				$_SESSION['usuarios'] = array();
				array_push($_SESSION['usuarios'], $usuario);
			}
			
			foreach ($_SESSION['usuarios'] as $u) {
				echo $u.'<br>';
			}
		}
	?>
</body>
</html>
<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<style type="text/css">
		fieldset{
			margin: auto;
			width: 200px;
		}
		input{
			width: 100%;
			margin-top: 5px;
		}
		#enviar{
			width: 103%;
		}

	</style>
</head>
<body>
	<form method="POST">
		<fieldset>
			<legend>Login</legend>
			<input type="text" name="login_name" placeholder="login"><br>
			<input type="password" name="senha" placeholder="senha"><br>
			<input type="submit" id="enviar" value="Enviar">
		</fieldset>
	</form>

	<?php
		if(isset($_POST['login_name']) && isset($_POST['senha'])){
			$login = $_POST['login_name'];
			$senha = $_POST['senha'];
			$senha_banco = '10203040';
			$login_banco = 'bob';

			if($login == $login_banco && $senha == $senha_banco){
				echo "Bem vindo ".$login;
				$_SESSION['usuario'] = $login;
				$_SESSION['senha'] = $senha;

				echo "<br><a href='login_teste.php'>iniciar</a>";
			}else{
				echo "Login ou senha incorreta!";
			}
		}
	?>
</body>
</html>
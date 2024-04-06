<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Teste</title>
</head>
<body>
	<h1><?php echo $_SESSION['usuario'].' '.$_SESSION['senha']; ?></h1><br>
	<a href="login.php">voltar</a>
</body>
</html>
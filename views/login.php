<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php BASE_URL ?>assets/css/login.css">
</head>
<body>
	<div class="loginarea">
		<span class="logo">
			<img src="<?php BASE_URL ?>assets/images/logo.png"/>	
		</span>		
		<form method="POST">
			<label>CPF</label>
			<input type="text" name="cpf" placeholder="Digite seu CPF">

			<input type="submit" value="Acessar">
		</form>
	</div>

	<?php if(isset($error) && !empty($error)) :?>
	<div class="erro">
		<?php echo $error; ?>
	</div>
	<?php endif; ?>
</body>
</html>
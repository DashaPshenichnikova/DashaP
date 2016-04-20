<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blogs</title>
	</head>
	<style>
	.forma{
		width: 400px;
		margin: 15px auto; 
		border: 1px solid #009F86;
		background: #C1ECE4;
		overflow: hidden;
	}
	input{
		margin:7px 0px 7px 40px;
		border-radius: 5px;
		width: 300px;
		padding-left: 10px;
		font-size: 20px;
		font-family: "Calibri";
		color: #000000;
		border: 1px solid #009F86;
	}
	legend{
		margin: 10px auto;
		font-size: 24px;
		font-family: "Calibri";
		font-weight: bold;
		color: #007864;
	}
	.button{
		margin:7px;
		float: right;
		border-radius: 5px;
		width: 150px;
		padding-left: 10px;
		font-size: 18px;
		font-family: "Calibri";
		background:#007864;
		color: #C1ECE4; 
	}
	.result{
		margin-left: 40px;
		font-size: 12px;
		font-family: "Calibri";
	}
	</style>
	<body>
		<div class="forma">
			<form action="index.php?action=authorization" method="POST" autocomplete="off">
				<legend>Авторизация</legend>
				<input type="text" name="login" placeholder="Логин">
				<input type="password" name="pass" placeholder="Пароль">
				<input class="button" type="submit" value="Отправить">
				<input type="hidden" name="token" value="<?php echo $token;?>">
				<p class="result"> <?php echo $login; ?> </p>
			</form>
		</div>
		<div class="forma">
			<form action="index.php?action=registr" method="POST" autocomplete="off">
				<legend>Регистрация</legend>
				<input type="text" name="name" placeholder="Имя">
				<input type="text" name="login" placeholder="Логин">
				<input type="password" name="pass" placeholder="Пароль">
				<input class="button" type="submit" value="Отправить">
				<input type="hidden" name="token" value="<?php echo $token; ?>">
			</form>
		</div>
	</body>
</html>
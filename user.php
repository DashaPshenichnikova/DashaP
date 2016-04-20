<?php

class user {
	public function login ($pass, $login, $token,$pdo){
		if(!empty($pass) && !empty($login) && $token==$_SESSION['token']){
			$query=$pdo->prepare("SELECT `login`, `password` FROM users WHERE `login`=:log and `password`=:pass");
			$query->execute([':log'=>$login,
							 ':pass'=>md5($pass)
				     		]);
			$result=$query->fetch();
				if($result!==false){
					$_SESSION["login"]=" ";
				}
				else{
					unset($_SESSION['login']);
				}
		}
		header("Location: index.php");
	}
	public function regist ($pass, $login, $name, $token, $pdo){
		if(!empty($name) && !empty($pass) && !empty($login) && $token==$_SESSION['token']){
			$query = $pdo->prepare("INSERT INTO `users` SET `name`=:name, `login`=:login,`password`=:password");
			$query->execute([':name' => $name,
							 ':login'=>$login,
							 ':password'=>md5($pass)]);
		}
		header("Location: index.php");
	}

}
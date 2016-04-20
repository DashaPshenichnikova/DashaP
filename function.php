<?php 

$pdo = new PDO ("mysql:host = localhost; dbname=epix; charset=utf8", "root","vagrant");//подключение к бд

function token(){
	$token=uniqid();
	$_SESSION['token']=$token;
	return $token;
}

function template ($name, $vars=[]){
	if (!is_file($name)) {
        throw new exception("Could not load template file {$name}");
    }
    ob_start();
    extract($vars);
    require($name);
    $contents = ob_get_contents();
    ob_end_clean();
    return $contents;

}

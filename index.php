<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require 'function.php';
spl_autoload_register(function($class){
	require "$class.php";
});

$start=new router();
$start->action();
$start->route($pdo);
 

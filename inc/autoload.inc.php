<?php 

spl_autoload_register(function($class){
	$class = strtolower($class);



	if (file_exists("controller/{$class}.class.php"))             
		require_once "controller/{$class}.class.php";

	if (file_exists("model/{$class}.class.php")) 
		require_once "model/{$class}.class.php";

	if (file_exists("{$class}.class.php"))             
		require_once "{$class}.class.php";

	if (file_exists("../model/{$class}.class.php")) 
		require_once "../model/{$class}.class.php";



});
?>
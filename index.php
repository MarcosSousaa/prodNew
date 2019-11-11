<?php

session_start();
require './config.php';

spl_autoload_register( function($class){
	if(strpos($class, 'Controller') > - 1){
		if(file_exists('./controllers/'.$class.'.php')){
			require_once './controllers/'.$class.'.php';
		}
	}
	if(file_exists('./models/'.$class.'.php')){
		require_once './models/'.$class.'.php';
	}
	if(file_exists('./core/'.$class.'.php')){
		require_once './core/'.$class.'.php';
	}

	if(file_exists('./util/' . $class . '.php')){
        require_once './util/' . $class . '.php';
    }


});

$core = new Core();
$core->run();

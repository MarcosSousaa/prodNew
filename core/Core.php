<?php

class Core{
	public function run(){
		$url = '/'. ( (isset($_GET['q'])) ? $_GET['q'] : '');
		$params = array();
		if( !empty($url) && $url != '/'){
            $url = explode('/', $url);
			array_shift($url); // Remove a posicao do $array[0]
			// Pegando qual controller
            $currentController = ucfirst($url[0]) . 'Controller';
            array_shift($url);
            // Pegando qual action
            if (isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = 'index';
            }
            // Pegando os parametros
            if (count($url) > 0) {
                $params = $url;
            }
        } else {
            $currentController = 'HomeController';
            $currentAction = 'index';
        
        }
        $controller = new $currentController();
        call_user_func_array(array($controller, $currentAction), $params);
	}
}

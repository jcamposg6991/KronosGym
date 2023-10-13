<?php

Class Core{

	public function __construct()
	{
		$this->run();
	}

	public function run(){

		$parameters = array();
		
		if(isset($_GET['pag'])){
			$url = $_GET['pag'];
		}
// aqui saco el controlador
		if(!empty($url)){
			$url = explode('/', $url);
			$controller = $url[0].'Controller';
			array_shift($url);
// aqui saco el metodo
			if(isset($url[0]) && !empty($url[0])){
				$method = $url[0];
				array_shift($url);
			}else{
				$method = 'index';
			}

			if(count($url) > 0 ){
				$parameters = $url;
			}
// si nada de lo anterior se cumple en automatico se cargan los siguientes datos:
		}else {
			$controller = 'inicioController';
			$method = 'index';
		}

		$route = 'Controllers/'.$controller.'.php';

//en caso de que un controlador o metodo no exista  se redirige al inicio
		If(!file_exists($route) && !method_exists($controller, $method)){
			$controller = 'inicioController';
			$method = 'index';
		}

		$c = new $controller;

		call_user_func_array(array($c,$method), $parameters);
	}

}

?>
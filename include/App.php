<?php

/**
 * 
 */
class App
{
	private $controller = 'Home';
	private $method = 'index';
	private $params = [];

	function __construct(){
		$url = $this->parseUrl();
		$e404 = false;

		if(!empty($url)){
			$this->controller = ucfirst($url[0]);

			if(!file_exists(BASEPATH . '/core/controller/' . $this->controller . '.php')){
				$e404 = true;
			}

			unset($url[0]);
		}

		require BASEPATH . '/core/controller/' . $this->controller . '.php';
		$this->controller = new $this->controller;

		if(!empty($url)){
			$this->method = $url[1];

			if(!method_exists($this->controller, $url[1])){
				$e404 = true;
			}

			unset($url[1]);
		}

		if($e404){
			header('location:' . DEFAULT_ERROR_PAGE);
		}elseif(!empty($url)){
			$this->params = array_values($url);
		}
	}

	private function parseUrl(){
		$url = [];
		if(isset($_GET['url'])){
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
		}

		return $url;
	}

	function run(){
		call_user_func_array([$this->controller, $this->method], $this->params);
	}
}
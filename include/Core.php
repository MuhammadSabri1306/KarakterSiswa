<?php
/**
 * 
 */
class Controller
{
	protected function setVisibility(...$visibility){
		$appUser = new User();

		if(!in_array($appUser->getLevel(), $visibility)){
			header('location:' . DEFAULT_KICK_PAGE);
			exit('You dont have access to this page');
		}
	}

	protected function model($model, $params = []){
		$model = "/core/model/$model.php";
		file_exists(BASEPATH . $model) or exit("Error to get Model's file on path: $model");
		
		include BASEPATH . $model;
		return $data;
	}

	protected function view($view, $model = null){
		$view = "/core/view/$view.php";
		file_exists(BASEPATH . $view) or exit("Error to get View's file on path: $view");

		if(!is_null($model) && !empty($model)){
			extract($model);
		}
		
		include BASEPATH . $view;
	}

	protected function getTemplate($template){
		$file = "/core/view/template/$template.php";
		file_exists(BASEPATH . $file) or exit("Error to get Template's file on path: $file");

		include BASEPATH . $file;
		return new $template;
	}

	protected function getService($service, $params = []){
		$service = "/core/service/$service.php";
		file_exists(BASEPATH . $service) or exit("Error to get Service's file on path: $service");

		require BASEPATH . $service;
	}

	protected function use($library){
		$library = "/lib/$library.php";
		file_exists(BASEPATH . $library) or exit("Error to get Library's file on path: $library");

		require_once BASEPATH . $library;
	}
}
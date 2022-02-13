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
		}
	}

	protected function model(){}

	protected function view($view, $model = null){
		$view = "/core/view/$view.php";
		file_exists(BASEPATH . $view) or exit("Error to get View's file on path: $view");

		if($model != null){
			extract($model);
		}
		
		include BASEPATH . $view;
	}

	protected function getTemplate($template){
		$file = "/core/view/template/$template.php";
		file_exists(BASEPATH . $file) or exit("Error to get View's file on path: $file");

		include BASEPATH . $file;
		return new $template;
	}

	protected function service(){}
}
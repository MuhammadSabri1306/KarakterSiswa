<?php
/**
 * 
 */
class Training extends Controller
{
	function index(){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$data = $this->model('data_latih');
		$this->view('data_latih', $data);
	}

	function upload(){
		$this->setVisibility(USER_LEVEL_ADMIN);
		$this->getService('upload_data_training');
	}

	function empty(){
		$this->setVisibility(USER_LEVEL_ADMIN);
		$this->getService('kosongkan_data_training');
	}
}
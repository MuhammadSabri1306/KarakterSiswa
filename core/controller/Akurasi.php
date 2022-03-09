<?php
/**
 * 
 */
class Akurasi extends Controller
{
	function index(){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$data = $this->model('data_uji');
		$this->view('akurasi', $data);
	}

	function upload(){
		$this->setVisibility(USER_LEVEL_ADMIN);
		$this->getService('upload_data_uji');
	}

	function empty(){
		$this->setVisibility(USER_LEVEL_ADMIN);
		$this->getService('kosongkan_data_uji');
	}

	function run(){}
}
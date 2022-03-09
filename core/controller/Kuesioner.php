<?php
/**
 * 
 */
class Kuesioner extends Controller
{
	function index(){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$data = $this->model('data_kuesioner');
		$this->view('kuesioner', $data);
	}

	function upload(){
		$this->setVisibility(USER_LEVEL_ADMIN);
		$this->getService('upload_kuesioner');
	}

	function empty(){
		$this->setVisibility(USER_LEVEL_ADMIN);
		$this->getService('kosongkan_kuesioner');
	}

	function analyze(){
		$this->setVisibility(USER_LEVEL_SISWA);

		$appUser = new User();
		$data = $this->model('form_kuesioner', ['id' => $appUser->getId()]);
		$this->view('form_kuesioner', $data);
	}

	function answer(){
		$this->setVisibility(USER_LEVEL_SISWA);
		$this->getService('jawab_kuesioner');
	}
}
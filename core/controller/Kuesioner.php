<?php
/**
 * 
 */
class Kuesioner extends Controller
{
	function index(){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$this->use('Database');
		$data = $this->model('data_kuesioner');
		$this->view('kuesioner1', $data);
	}

	function upload(){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$this->use('Database');
		$this->use('ExcelReader');

		$this->getService('upload_kuesioner1');
	}

	function empty(){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$this->use('Database');
		$this->getService('kosongkan_kuesioner');
	}

	function analyze(){
		$this->setVisibility(USER_LEVEL_SISWA);

		$this->use('Database');
		$appUser = new User();

		$data = $this->model('form_kuesioner2', ['id' => $appUser->getId()]);
		$this->view('form_kuesioner3', $data);
	}

	function answer(){
		$this->setVisibility(USER_LEVEL_SISWA);

		$this->use('Database');
		$this->use('NaiveBayes');

		$this->getService('jawab_kuesioner1');
	}
}
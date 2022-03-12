<?php
/**
 * 
 */
class Akurasi extends Controller
{
	function index(){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$this->use('Database');
		$data = $this->model('data_uji');
		$this->view('akurasi', $data);
	}

	function upload(){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$this->use('Database');
		$this->use('ExcelReader');
		
		$this->getService('upload_data_uji');
	}

	function empty(){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$this->use('Database');
		$this->getService('kosongkan_data_uji');
	}

	function run(){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$this->use('Database');
		$this->use('NaiveBayes');

		$this->getService('uji_akurasi');
		$data = $this->model('data_hasil_uji');
		$this->view('akurasi_uji', $data);
	}
}
<?php
/**
 * 
 */
class Siswa extends Controller
{
	function index(){
		$this->setVisibility(USER_LEVEL_ADMIN, USER_LEVEL_GURU);

		$this->use('Database');
		$this->use('whatsappNumberFormat');

		$data = $this->model('data_siswa');
		$this->view('siswa', $data);
	}

	function details($id){
		$this->setVisibility(USER_LEVEL_ADMIN, USER_LEVEL_GURU);

		$this->use('Database');
		$data = $this->model('detail_siswa', ['id' => $id]);
		$this->view('siswa_detail', $data);
	}

	function my(){
		$this->setVisibility(USER_LEVEL_SISWA);

		$this->use('Database');
		$appUser = new User();

		$data = $this->model('detail_siswa', ['id' => $appUser->getId()]);
		$this->view('siswa_my_detail', $data);
	}

	function upload(){
		$this->setVisibility(USER_LEVEL_ADMIN, USER_LEVEL_GURU);

		$this->use('Database');
		$this->use('ExcelReader');

		$this->getService('upload_data_siswa');
	}

	function add(){
		$this->setVisibility(USER_LEVEL_ADMIN, USER_LEVEL_GURU);

		$this->use('Database');
		$this->getService('tambah_siswa');
	}

	function edit(){
		$this->setVisibility(USER_LEVEL_ADMIN, USER_LEVEL_GURU);

		$this->use('Database');
		$this->getService('edit_siswa');
	}

	function del($id){
		$this->setVisibility(USER_LEVEL_ADMIN, USER_LEVEL_GURU);

		$this->use('Database');
		$this->getService('hapus_siswa', ['id' => $id]);
	}

	function empty(){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$this->use('Database');
		$this->getService('kosongkan_data_siswa');
	}
}
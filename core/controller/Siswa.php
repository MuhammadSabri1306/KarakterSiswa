<?php
/**
 * 
 */
class Siswa extends Controller
{
	function index(){
		$this->setVisibility(USER_LEVEL_ADMIN, USER_LEVEL_GURU);

		$data = $this->model('data_siswa');
		$this->view('siswa', $data);
	}

	function details($id){
		$this->setVisibility(USER_LEVEL_ADMIN, USER_LEVEL_GURU);

		$data = $this->model('detail_siswa', ['id' => $id]);
		$this->view('siswa_detail', $data);
	}

	function own(){
		$this->setVisibility(USER_LEVEL_SISWA);

		$appUser = new User();
		$data = $this->model('detail_siswa', ['id' => $appUser->getId()]);
		$this->view('siswa_detail', $data);
	}

	function add(){
		$this->setVisibility(USER_LEVEL_ADMIN, USER_LEVEL_GURU);
		$this->getService('tambah_siswa');
	}

	function edit(){
		$this->setVisibility(USER_LEVEL_ADMIN, USER_LEVEL_GURU);
		$this->getService('edit_siswa');
	}

	function del($id){
		$this->setVisibility(USER_LEVEL_ADMIN, USER_LEVEL_GURU);
		$this->getService('hapus_siswa', ['id' => $id]);
	}
}
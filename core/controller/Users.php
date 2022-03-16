<?php
/**
 * 
 */
class Users extends Controller
{
	function index(){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$this->use('Database');
		$data = $this->model('data_users');
		$this->view('data_users', $data);
	}

	function details($id){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$this->use('Database');
		$data = $this->model('detail_users', ['id' => $id]);
		$this->view('detail_users', $data);
	}

	function add(){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$this->use('Database');
		$this->getService('tambah_users');
	}

	function edit($id){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$this->use('Database');
		$this->getService('edit_users', ['id' => $id]);
	}

	function del($id){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$this->use('Database');
		$this->getService('hapus_users', ['id' => $id]);
	}
}
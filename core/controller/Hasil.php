<?php
/**
 * 
 */
class Hasil extends Controller
{
	function index(){
		$this->setVisibility(USER_LEVEL_ADMIN, USER_LEVEL_GURU);

		$this->use('Database');
		$this->use('whatsappNumberFormat');
		
		$data = $this->model('data_hasil');
		$this->view('hasil', $data);
	}

	function my(){
		$this->setVisibility(USER_LEVEL_SISWA);

		$this->use('Database');
		$appUser = new User();
		
		$data = $this->model('detail_hasil', ['id' => $appUser->getId()]);
		$this->view('hasil_detail', $data);
	}
}
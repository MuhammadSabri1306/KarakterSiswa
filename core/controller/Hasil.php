<?php
/**
 * 
 */
class Hasil extends Controller
{
	function index(){
		$this->setVisibility(USER_LEVEL_ADMIN, USER_LEVEL_GURU);

		$data = $this->model('data_hasil');
		$this->view('hasil', $data);
	}

	function own(){
		$this->setVisibility(USER_LEVEL_SISWA);

		$appUser = new User();
		$data = $this->model('detail_hasil', ['id' => $appUser->getId()]);
		$this->view('hasil_detail', $data);
	}
}
<?php
/**
 * 
 */
class Home extends Controller
{
	function index(){
		$this->setVisibility(USER_LEVEL_ADMIN, USER_LEVEL_GURU, USER_LEVEL_SISWA, USER_LEVEL_UNKNOWN);
		$this->view('home');
	}
}
<?php
/**
 * 
 */
class Login extends Controller
{
	function index(){
		$this->setVisibility(USER_LEVEL_UNKNOWN);
		$this->view('login');
	}

	function auth(){
		$this->setVisibility(USER_LEVEL_UNKNOWN);
		$this->getService('cek_login');
	}

	function failed(){
		$this->setVisibility(USER_LEVEL_UNKNOWN);
		$this->view('login', ['failed' => 'failed']);
	}
}
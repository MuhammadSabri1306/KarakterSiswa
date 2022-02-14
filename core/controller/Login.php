<?php
/**
 * 
 */
class Login extends Controller
{
	function index($failed = ''){
		$this->setVisibility(USER_LEVEL_UNKNOWN);

		$failed = ($failed == 'failed');
		$this->view('login', ['failed' => $failed]);
	}

	function auth(){
		$this->setVisibility(USER_LEVEL_UNKNOWN);
		$this->getService('authorizeLogin');
	}
}
<?php
/**
 * 
 */
class Home extends Controller
{
	function index(){
		$this->setVisibility(USER_LEVEL_UNKNOWN);
		$this->view('home');
	}
}
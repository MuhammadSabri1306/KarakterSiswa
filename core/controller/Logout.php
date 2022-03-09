<?php
/**
 * 
 */
class Logout extends Controller
{
	function index(){
		$appUser = new User();
		$appUser->clear();

		header('location:' . BASEDOMAIN . '/home');
	}
}
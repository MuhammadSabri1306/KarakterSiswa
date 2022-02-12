<?php
/**
 * 
 */
class Controller
{
	protected function setVisibility($v){
		if($user->getLevel() != $v){
			header('location:' . DEFAULT_KICK_PAGE);
		}
	}

	protected function model(){}

	protected function view(){}

	protected function service(){}
}
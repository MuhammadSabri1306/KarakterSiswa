<?php
/**
 * 
 */
class User
{
	function __construct(){
		if(!isset($_SESSION['user'])){
			$_SESSION['user'] = array();
		}

		$this->setId(null);
		$this->setUsername(null);
		$this->setName(null);
		$this->setLevel(USER_LEVEL_UNKNOWN);
	}

	function setId($id){
		$_SESSION['user']['id'] = $id;
	}

	function getId(){
		return $_SESSION['user']['id'];
	}

	function setUsername($username){
		$_SESSION['user']['username'] = $username;
	}

	function getUsername(){
		return $_SESSION['user']['username'];
	}

	function setName($name){
		$_SESSION['user']['name'] = $name;
	}

	function getName(){
		return $_SESSION['user']['name'];
	}

	function setLevel($level){
		$_SESSION['user']['level'] = $level;
	}

	function getLevel(){
		return $_SESSION['user']['level'];
	}

	function hasLogin(){
		return $this->getLevel() != USER_LEVEL_UNKNOWN;
	}

	function logout(){
		$_SESSION['user'] = array();
		unset($_SESSION['user']);
		session_destroy();
	}
}
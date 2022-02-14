<?php

isset($_POST['username'], $_POST['password'], $_POST['login']) or exit('Failed to pass username, password, or login as POST');

$user = strip_tags(trim($_POST['username'])); #echo $user;
$pass = strip_tags(trim($_POST['password']));

$database = $this->call('Database');
$database->query("SELECT * FROM users WHERE username=:user");
$database->bind('user', $user);

$dbResult = $database->resultRow();
if(!password_verify($pass, $dbResult['password'])){
	header('location:' . BASEDOMAIN . '/login/failed');
}

$appUser = new User();
$appUser->setId($dbResult['id_user']);
$appUser->setUsername($dbResult['username']);
$appUser->setName($dbResult['nama']);
$appUser->setLevel($dbResult['level']);

header('location:' . BASEDOMAIN . '/home');

/*
 *
 * 1. Lengkapi library class Database
 * 2. Ganti password di database dgn password_hash()
 *
 */
<?php

isset($_POST['jenis'], $_POST['nama'], $_POST['user_name'], $_POST['add']) or exit('Failed to pass POST variable');

function getPost($name){
	return strip_tags(trim($_POST[$name]));
}

if(getPost('jenis') == USER_LEVEL_GURU){

	$database = new Database();
	$database->query('INSERT INTO users (nama, username, password, level) VALUES (:nama, :user, :pass, :level)');
	$database->bind('nama', getPost('nama'));
	$database->bind('user', getPost('user_name'));
	$database->bind('pass', password_hash(getPost('user_name'), PASSWORD_DEFAULT));
	$database->bind('level', USER_LEVEL_GURU);
	$insert = $database->execute();

	$insert OR exit('Failed to INSERT INTO table users in tambah_users.php on line ' . strval(__LINE__ - 2));

	?><script type="text/javascript">
		alert("Berhasil disimpan!");
		document.location.href = "<?=BASEDOMAIN?>/users/";
	</script><?php

}else{

	$_SESSION['dataUsersToDataSiswa'] = array(
		'nama' => getPost('nama'),
		'username' => getPost('user_name')
	);
	header('location: ' . BASEDOMAIN . '/siswa');

}
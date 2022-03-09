<?php

isset($_POST['nama'], $_POST['nis'], $_POST['user_name'], $_POST['jenis_kelamin'], $_POST['usia'], $_POST['sekolah'], $_POST['nama_orgtua'], $_POST['telp_orgtua'], $_POST['add']) or exit('Failed to pass POST variable');

function getPost($name){
	return strip_tags(trim($_POST[$name]));
}

$database = $this->call('Database');
$database->query('INSERT INTO users (nama, username, password, level) VALUES (:nama, :username, :password, 2)');

$database->bind('nama', getPost('nama'));
$database->bind('username', getPost('user_name'));
$database->bind('password', password_hash(getPost('user_name'), PASSWORD_DEFAULT));
$insert = $database->execute();

if($insert){
	$lasInsertedId = $database->lastInsertId();
	$database->query('INSERT INTO data_siswa (nama_siswa, nis, jenis_kelamin, usia, sekolah, id_user, nama_orgtua, telp_orgtua) VALUES (:nama, :nis, :jkel, :usia, :sekolah, :id, :nama_orgtua, :telp_orgtua)');

	$database->bind('nama', getPost('nama'));
	$database->bind('nis', getPost('nis'));
	$database->bind('jkel', getPost('jenis_kelamin'));
	$database->bind('usia', getPost('usia'));
	$database->bind('sekolah', getPost('sekolah'));
	$database->bind('id', $lasInsertedId);
	$database->bind('nama_orgtua', getPost('nama_orgtua'));
	$database->bind('telp_orgtua', getPost('telp_orgtua'));

	$insert = $database->execute();
	// $database->debugDumpParams();
}

if($insert){

	?><script type="text/javascript">
		alert("Berhasil disimpan!");
		document.location.href = "<?=BASEDOMAIN?>/siswa/";
	</script><?php

}else{

	?><script type="text/javascript">
		alert("Gagal disimpan!");
	</script><?php

}
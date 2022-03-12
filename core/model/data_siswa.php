<?php

$database = new Database();
$database->query('SELECT siswa.*, usr.username FROM data_siswa siswa, users usr WHERE siswa.`id_user` = usr.`id_user`');

$data = array('jumlah' => $database->numRows());
if($data['jumlah'] > 0){
	$data['siswa'] = $database->resultSet();
}

for($i=0; $i<count($data['siswa']); $i++){
	if(substr($data['siswa'][$i]['telp_orgtua'], 0, 1) == '0'){
		$data['siswa'][$i]['telp_orgtua'] = substr_replace($data['siswa'][$i]['telp_orgtua'], '62', 0, 1);
	}
	if(substr($data['siswa'][$i]['telp_orgtua'], 0, 1) == '+'){
		$data['siswa'][$i]['telp_orgtua'] = substr_replace($data['siswa'][$i]['telp_orgtua'], '', 0, 1);
	}
}
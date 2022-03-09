<?php

$database = $this->call('Database');
$database->query('SELECT siswa.id FROM data_siswa siswa, data_hasil_klasifikasi hasil WHERE siswa.`id`=hasil.`id_siswa` AND siswa.`id_user`=:id');
$database->bind('id', $params['id']);
$isExists = ($database->numRows() > 0);

if($isExists){
	$data = array('soal' => []);
}else{

	$database->query('SELECT * FROM data_soal');
	$data = array('soal' => $database->resultSet());

}
<?php

$database = $this->call('Database');
$database->query('SELECT siswa.`nama_siswa`, hasil.* FROM data_hasil_klasifikasi hasil, data_siswa siswa WHERE siswa.`id` = hasil.`id_siswa`');

$data = array('jumlah' => $database->numRows());
if($data['jumlah'] > 0){
	$data['hasil'] = $database->resultSet();
}
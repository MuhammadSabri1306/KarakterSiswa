<?php

$database = new Database();
$database->query('SELECT siswa.`nama_siswa`, siswa.`telp_orgtua`, hasil.* FROM data_hasil_klasifikasi hasil, data_siswa siswa WHERE siswa.`id` = hasil.`id_siswa`');

$data = array('jumlah' => $database->numRows());
if($data['jumlah'] > 0){
	$data['hasil'] = $database->resultSet();
}

for($i=0; $i<count($data['hasil']); $i++){
	$data['hasil'][$i]['telp_orgtua'] = whatsappNumberFormat($data['hasil'][$i]['telp_orgtua']);
}
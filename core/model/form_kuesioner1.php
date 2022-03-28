<?php

$database = new Database();
$database->query('SELECT siswa.id FROM data_siswa siswa, data_hasil_klasifikasi hasil WHERE siswa.`id`=hasil.`id_siswa` AND siswa.`id_user`=:id');
$database->bind('id', $params['id']);
$isExists = ($database->numRows() > 0);

$data = array(
	'soalKelebihan' => array(),
	'soalKekurangan' => array()
);

if(!$isExists){

	$database->query('SELECT * FROM data_soal');
	$dataSoal = $database->resultSet();
	$data['jumlah'] = count($dataSoal);

	foreach($dataSoal as $soal){
		if($soal['kategori'] == 'Kelebihan'){
			array_push($data['soalKelebihan'], $soal);
		}elseif($soal['kategori'] == 'Kekurangan'){
			array_push($data['soalKekurangan'], $soal);
		}
	}

}
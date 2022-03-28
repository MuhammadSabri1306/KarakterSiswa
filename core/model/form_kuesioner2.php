<?php

$database = new Database();
$database->query('SELECT siswa.id FROM data_siswa siswa, data_hasil_klasifikasi hasil WHERE siswa.`id`=hasil.`id_siswa` AND siswa.`id_user`=:id');
$database->bind('id', $params['id']);

$isExists = ($database->numRows() > 0);
$data = array('jumlah' => 0);

if(!$isExists){

	$database->query('SELECT * FROM data_soal');
	$dataSoal = $database->resultSet();
	$data['jumlah'] = count($dataSoal);

	$data['soal_a_kelebihan'] = array_filter($dataSoal, function($row){
		return ($row['tipe_karakter'] == 'Sanguin' && $row['kategori'] == 'Kelebihan');
	});
	$data['soal_a_kekurangan'] = array_filter($dataSoal, function($row){
		return ($row['tipe_karakter'] == 'Sanguin' && $row['kategori'] == 'Kekurangan');
	});
	$data['soal_b_kelebihan'] = array_filter($dataSoal, function($row){
		return ($row['tipe_karakter'] == 'Koleris' && $row['kategori'] == 'Kelebihan');
	});
	$data['soal_b_kekurangan'] = array_filter($dataSoal, function($row){
		return ($row['tipe_karakter'] == 'Koleris' && $row['kategori'] == 'Kekurangan');
	});
	$data['soal_c_kelebihan'] = array_filter($dataSoal, function($row){
		return ($row['tipe_karakter'] == 'Melankolis' && $row['kategori'] == 'Kelebihan');
	});
	$data['soal_c_kekurangan'] = array_filter($dataSoal, function($row){
		return ($row['tipe_karakter'] == 'Melankolis' && $row['kategori'] == 'Kekurangan');
	});
	$data['soal_d_kelebihan'] = array_filter($dataSoal, function($row){
		return ($row['tipe_karakter'] == 'Plegmatis' && $row['kategori'] == 'Kelebihan');
	});
	$data['soal_d_kekurangan'] = array_filter($dataSoal, function($row){
		return ($row['tipe_karakter'] == 'Plegmatis' && $row['kategori'] == 'Kekurangan');
	});

}
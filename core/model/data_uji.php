<?php

$database = new Database();
$database->query('SELECT nama, jenis_kelamin, usia, sekolah, jawaban_a, jawaban_b, jawaban_c, jawaban_d, kelas_asli FROM data_uji');

$data = array('jumlah' => $database->numRows());
if($data['jumlah'] > 0){
	$data['uji'] = $database->resultSet();
}
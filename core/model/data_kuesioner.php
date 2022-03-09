<?php

$database = $this->call('Database');
$database->query('SELECT * FROM data_soal');

$data = array('jumlah' => $database->numRows());
if($data['jumlah'] > 0){
	$data['kuesioner'] = $database->resultSet();
}
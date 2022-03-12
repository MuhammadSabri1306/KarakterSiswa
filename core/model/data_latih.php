<?php

$database = new Database();
$database->query('SELECT * FROM data_latih');

$data = array('jumlah' => $database->numRows());
if($data['jumlah'] > 0){
	$data['training'] = $database->resultSet();
}
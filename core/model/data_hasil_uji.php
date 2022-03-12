<?php

$database = new Database();
$database->query('SELECT nama, kelas_asli, kelas_hasil, IF(kelas_asli=kelas_hasil, 1, 0) AS hasil FROM data_uji');

$data = array('jmlData' => $database->numRows());
if($data['jmlData'] > 0){
	$data['uji'] = $database->resultSet();
	$data['jmlBenar'] = array_sum(array_column($data['uji'], 'hasil'));
	$data['jmlSalah'] = $data['jmlData'] - $data['jmlBenar'];
	$data['akurasi'] = number_format($data['jmlBenar'] * 100 / $data['jmlData'], 2);
}
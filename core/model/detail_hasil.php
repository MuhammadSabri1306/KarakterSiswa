<?php

$database = new Database();

$database->query('SELECT siswa.id, siswa.nama_siswa, siswa.nis, hasil.kelas_hasil, hasil.nilai_sanguin, hasil.nilai_koleris, hasil.nilai_melankolis, hasil.nilai_plegmatis FROM data_siswa siswa, data_hasil_klasifikasi hasil WHERE siswa.`id`=hasil.`id_siswa` AND siswa.`id_user`=:id');

$database->bind('id', $params['id']);

$data = array('jumlah' => $database->numRows());
if($data['jumlah'] > 0){
	$data['hasil'] = $database->resultRow();
}

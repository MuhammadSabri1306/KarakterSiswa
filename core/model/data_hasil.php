<?php

function formatJawaban($kategori, $jawaban){
	in_array($kategori, ['kelebihan', 'kekurangan']) OR exit('Kategori salah!, formatJawaban($kategori, $jawaban)');

	$arrMap = function($row){
		return array(
			'keyword' => htmlentities($row['keyword']),
			'keterangan' => htmlentities($row['keterangan'])
		);
	};

	$arrFilter = array(
		'kelebihan' => function($row){
			return $row['kategori'] == 'Kelebihan';
		}, 'kekurangan' => function($row){
			return $row['kategori'] == 'Kekurangan';
		}
	);

	return array_map($arrMap, array_values(array_filter($jawaban, $arrFilter[$kategori])));
}

$database = new Database();
$database->query('SELECT siswa.`id`, siswa.`nama_siswa`, siswa.`telp_orgtua`, hasil.* FROM data_hasil_klasifikasi hasil, data_siswa siswa WHERE siswa.`id` = hasil.`id_siswa`');

$data = array('jumlah' => $database->numRows());
if($data['jumlah'] > 0){
	$data['hasil'] = $database->resultSet();
	$jawaban = array();

	for($i=0; $i<count($data['hasil']); $i++){
		$data['hasil'][$i]['telp_orgtua'] = whatsappNumberFormat($data['hasil'][$i]['telp_orgtua']);
		$idSiswa = $data['hasil'][$i]['id'];

		$database->query('SELECT soal.`keyword`, soal.`kategori`, soal.`keterangan` FROM data_soal soal, jawaban_kuisioner jawaban WHERE soal.`id`=jawaban.`id_soal` AND jawaban.`id_siswa`=:id_siswa');
		$database->bind('id_siswa', $idSiswa);
		$semuaJawaban = $database->resultSet();

		$jawaban[$idSiswa]['kelebihan'] = formatJawaban('kelebihan', $semuaJawaban);
		$jawaban[$idSiswa]['kekurangan'] = formatJawaban('kekurangan', $semuaJawaban);
	}

	$data['jawabanJSON'] = json_encode($jawaban);
}

// var_dump($data['jawabanJSON']);
// exit('MODEL');
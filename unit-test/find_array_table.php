<?php
require BASEPATH . '/lib/Database.php';

function getTrainingSetByFilter($data, $filter = ['field' => 'value']){

	$result = array();

	for($i=0; $i<count($data); $i++){
		$check = true;
		foreach($filter as $field => $value){
			if($check){
				$check = ($data[$i][$field] == $value);
			}
		}

		if($check){
			array_push($result, $data[$i]);
		}
	}

	return $result;
}

$database = new Database();
$database->query('SELECT jenis_kelamin, usia, sekolah, jawaban_a, jawaban_b, jawaban_c, jawaban_d, kelas_asli FROM data_latih');
$data = $database->resultSet();

// $filter = array('kelas_asli' => 'Sanguin');
$filter = array(
	'kelas_asli' => 'Sanguin',
	'sekolah' => 'Swasta'
);
$result = getTrainingSetByFilter($data, $filter);

/*$sum = 0;
foreach($result as $r){
	$sum += (int)$r['usia'];
}*/

var_dump($result);




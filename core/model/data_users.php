<?php

$database = new Database();
$database->query('SELECT id_user AS id, nama, username, level FROM users ORDER BY id_user DESC');
$dataset = $database->resultSet();
$data = array(
	'dataAdmin' => null,
	'dataGuru' => array(),
	'dataSiswa' => array()
);

$filter = function($key){ return $key != 'level'; };

for($i=0; $i<count($dataset); $i++){
	if($dataset[$i]['level'] == USER_LEVEL_ADMIN){

		$data['dataAdmin'] = array_filter($dataset[$i], $filter, ARRAY_FILTER_USE_KEY);

	}elseif($dataset[$i]['level'] == USER_LEVEL_GURU){

		array_push($data['dataGuru'], array_filter($dataset[$i], $filter, ARRAY_FILTER_USE_KEY));

	}elseif($dataset[$i]['level'] == USER_LEVEL_SISWA){

		array_push($data['dataSiswa'], array_filter($dataset[$i], $filter, ARRAY_FILTER_USE_KEY));
		
	}
}

$data['jmlGuru'] = count($data['dataGuru']);
$data['jmlSiswa'] = count($data['dataSiswa']);
<?php

$database = new Database();

// --------------- START setup Class Field Naive Bayes dari tabel data_uji ---------------
$naiveBayesParams = array('classField' => 'kelas_asli');
// --------------- END setup Class Field Naive Bayes dari tabel data_uji ---------------

// --------------- START setup Training Set Naive Bayes ---------------
// --------------- START setup Training Set Naive Bayes dari tabel data_latih ---------------
$database->query('SELECT jenis_kelamin, usia, sekolah, jawaban_a, jawaban_b, jawaban_c, jawaban_d, kelas_asli FROM data_latih');
$naiveBayesParams['trainingSet'] = $database->resultSet();
// --------------- END setup Training Set Naive Bayes dari tabel data_latih ---------------

// --------------- START setup Training Set Naive Bayes dari tabel data_uji ---------------
$database->query('SELECT * FROM data_uji');
$dataUji = $database->resultSet();

$naiveBayesParams['trainingSet'] = array_merge($naiveBayesParams['trainingSet'], array_map(function(row){
	unset($row['id'], $row['id_siswa'], $row['nama'] ,$row['kelas_hasil'] ,$row['nilai_sanguin'] ,$row['nilai_koleris'] ,$row['nilai_melankolis'] ,$row['nilai_plegmatis']);
	return $row;
}, $dataUji));

/*for($i=0; $i<count($dataUji); $i++){
	$temp = array(
		'jenis_kelamin' => $dataUji[$i]['jenis_kelamin'],
		'usia' => $dataUji[$i]['usia'],
		'sekolah' => $dataUji[$i]['sekolah'],
		'jawaban_a' => $dataUji[$i]['jawaban_a'],
		'jawaban_b' => $dataUji[$i]['jawaban_b'],
		'jawaban_c' => $dataUji[$i]['jawaban_c'],
		'jawaban_d' => $dataUji[$i]['jawaban_d'],
		'kelas_asli' => $dataUji[$i]['kelas_asli']
	);

	array_push($naiveBayesParams['trainingSet'], $temp);
}*/
// --------------- END setup Training Set Naive Bayes dari tabel data_uji ---------------
// --------------- START setup Training Set Naive Bayes ---------------

// --------------- START setup Kelas Naive Bayes ---------------
$naiveBayesParams['classes'] = ['Sanguin', 'Koleris', 'Melankolis', 'Plegmatis'];
// --------------- END setup Kelas Naive Bayes ---------------

for($i=0; $i<count($dataUji); $i++){

	// --------------- START setup Parameter Naive Bayes dari tabel data_uji ke-n ---------------
	$naiveBayesParams['params'] = array(
		'jenis_kelamin' => $dataUji[$i]['jenis_kelamin'],
		'usia' => $dataUji[$i]['usia'],
		'sekolah' => $dataUji[$i]['sekolah'],
		'jawaban_a' => $dataUji[$i]['jawaban_a'],
		'jawaban_b' => $dataUji[$i]['jawaban_b'],
		'jawaban_c' => $dataUji[$i]['jawaban_c'],
		'jawaban_d' => $dataUji[$i]['jawaban_d']
	);
	// --------------- END setup Parameter Naive Bayes dari tabel data_uji ke-n ---------------

	// --------------- START Inisisasi Class Naive Bayes ---------------
	$naiveBayes = NaiveBayes::init($naiveBayesParams);
	$naiveBayes->setCategoryOfAttribute('jenis_kelamin', ['L', 'P']);
	$naiveBayes->setCategoryOfAttribute('sekolah', ['Swasta', 'Negeri']);
	// --------------- END Inisisasi Class Naive Bayes ---------------

	// --------------- START proses Naive Bayes dan UPDATE data ke tabel data_uji ---------------
	$kelas_hasil = $naiveBayes->getClassificationResult();
	$nilai_kelas = $naiveBayes->getResultProbabilityOfClassOnCondition();

	$database->query('UPDATE data_uji SET kelas_hasil=:kelas, nilai_sanguin=:sanguin, nilai_koleris=:koleris, nilai_melankolis=:melankolis, nilai_plegmatis=:plegmatis WHERE id=:id');
	$database->bind('kelas', $kelas_hasil);
	$database->bind('sanguin', $nilai_kelas['Sanguin']);
	$database->bind('koleris', $nilai_kelas['Koleris']);
	$database->bind('melankolis', $nilai_kelas['Melankolis']);
	$database->bind('plegmatis', $nilai_kelas['Plegmatis']);
	$database->bind('id', $dataUji[$i]['id']);

	$update = $database->execute();
	// --------------- END proses Naive Bayes dan UPDATE data ke tabel data_uji ---------------

	$update OR exit('Error MySQL in uji_akurasi.php on line ' . __LINE__ . ', $i = ' . $i . ' query: UPDATE data_uji SET kelas_hasi....');
}















<?php

require BASEPATH . '/lib/Database.php';
require BASEPATH . '/lib/NaiveBayes.php';

$id_user = 100;

$classes = ['Sanguin', 'Koleris', 'Melankolis', 'Plegmatis'];

$database = new Database();
$database->query('SELECT jenis_kelamin, usia, sekolah, jawaban_a, jawaban_b, jawaban_c, jawaban_d, kelas_asli FROM data_latih');
$trainingSet = $database->resultSet();

$database->query('SELECT jenis_kelamin, usia, sekolah, jawaban_a, jawaban_b, jawaban_c, jawaban_d FROM data_uji WHERE id=:id');
$database->bind('id', $id_user);
/*$database->query('SELECT jenis_kelamin, usia, sekolah, jawaban_a, jawaban_b, jawaban_c, jawaban_d FROM data_uji WHERE id=1');*/
$params = $database->resultRow();

$naiveBayes = new NaiveBayes($classes, 'kelas_asli', $trainingSet, $params);
$naiveBayes->setAttribute('jenis_kelamin', ['L', 'P']);
$naiveBayes->setAttribute('sekolah', ['Swasta', 'Negeri']);

$result = $naiveBayes->getAllParams();
$result['kelas_hasil'] = $naiveBayes->getClassificationResult();

$nilai_kelas = $naiveBayes->getResultProbabilityOfClassOnCondition();
foreach($nilai_kelas as $kelas => $nilai){
	$key = 'nilai_' . strtolower($kelas);
	$result[$key] = $nilai;
}

var_dump($result);


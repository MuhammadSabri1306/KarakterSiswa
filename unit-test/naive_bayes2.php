<?php

require BASEPATH . '/lib/Database.php';
require BASEPATH . '/lib/NaiveBayes.php';

$id_user = 100;

$database = new Database();
$database->query('SELECT jenis_kelamin, usia, sekolah, jawaban_a, jawaban_b, jawaban_c, jawaban_d, kelas_asli FROM data_latih');
$trainingSet = $database->resultSet();

$database->query('SELECT jenis_kelamin, usia, sekolah, jawaban_a, jawaban_b, jawaban_c, jawaban_d FROM data_uji WHERE id=:id');
// $database->query('SELECT siswa.jenis_kelamin, siswa.usia, siswa.sekolah, SUM(IF(jawab.jawaban='A' AND jawab.id_siswa='1', 1, 0)) AS jawaban_a, SUM(IF(jawab.jawaban='B' AND jawab.id_siswa='1', 1, 0)) AS jawaban_b, SUM(IF(jawab.jawaban='C' AND jawab.id_siswa='1', 1, 0)) AS jawaban_c, SUM(IF(jawab.jawaban='D' AND jawab.id_siswa='1', 1, 0)) AS jawaban_d FROM data_siswa siswa, jawaban_kuisioner jawab WHERE siswa.id=2 AND jawab.id_siswa=2;');
$database->bind('id', $id_user);
$params = $database->resultRow();

$classes = ['Sanguin', 'Koleris', 'Melankolis', 'Plegmatis'];
$naiveBayes = new NaiveBayes($classes, 'kelas_asli', $trainingSet, $params);
$naiveBayes->setCategoryOfAttribute('jenis_kelamin', ['L', 'P']);
$naiveBayes->setCategoryOfAttribute('sekolah', ['Swasta', 'Negeri']);

$result = $naiveBayes->getAllParams();
$result['kelas_hasil'] = $naiveBayes->getClassificationResult();

$nilai_kelas = $naiveBayes->getResultProbabilityOfClassOnCondition();
foreach($nilai_kelas as $kelas => $nilai){
	$result[$kelas] = $nilai;
}

var_dump($result['kelas_hasil']);


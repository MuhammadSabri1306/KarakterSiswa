<?php

require BASEPATH . '/lib/Database.php';
require BASEPATH . '/lib/NaiveBayesss.php';

$id_user = 100;

$database = new Database();
$nb = new NaiveBayes($database);

$nb->pushClasses('sanguin', 'SELECT SUM(IF(kelas_asli="sanguin", 1, 0)) AS kelas FROM data_latih');
$nb->pushClasses('koleris', 'SELECT SUM(IF(kelas_asli="koleris", 1, 0)) AS kelas FROM data_latih');
$nb->pushClasses('melankolis', 'SELECT SUM(IF(kelas_asli="melankolis", 1, 0)) AS kelas FROM data_latih');
$nb->pushClasses('plegmatis', 'SELECT SUM(IF(kelas_asli="plegmatis", 1, 0)) AS kelas FROM data_latih');

$nb->pushCondition('jenis_kelamin', 'L', 'SELECT SUM(IF(jenis_kelamin="L" AND kelas_asli=":class", 1, 0)) AS cond FROM data_latih');
$nb->pushCondition('jenis_kelamin', 'P', 'SELECT SUM(IF(jenis_kelamin="P" AND kelas_asli=":class", 1, 0)) AS cond FROM data_latih');
$nb->pushCondition('sekolah', 'negeri', 'SELECT SUM(IF(sekolah="negeri" AND kelas_asli=":class", 1, 0)) AS cond FROM data_latih');
$nb->pushCondition('sekolah', 'swasta', 'SELECT SUM(IF(sekolah="swasta" AND kelas_asli=":class", 1, 0)) AS cond FROM data_latih');

$nb->pushNumericCondition('usia', 'SELECT usia AS numCond FROM data_latih WHERE kelas_asli=":class"', 'SELECT SUM(usia) AS numCond FROM data_latih WHERE kelas_asli=":class"');
$nb->pushNumericCondition('jawaban_a', 'SELECT jawaban_a AS numCond FROM data_latih WHERE kelas_asli=":class"', 'SELECT SUM(jawaban_a) AS numCond FROM data_latih WHERE kelas_asli=":class"');
$nb->pushNumericCondition('jawaban_b', 'SELECT jawaban_b AS numCond FROM data_latih WHERE kelas_asli=":class"', 'SELECT SUM(jawaban_b) AS numCond FROM data_latih WHERE kelas_asli=":class"');
$nb->pushNumericCondition('jawaban_c', 'SELECT jawaban_c AS numCond FROM data_latih WHERE kelas_asli=":class"', 'SELECT SUM(jawaban_c) AS numCond FROM data_latih WHERE kelas_asli=":class"');
$nb->pushNumericCondition('jawaban_d', 'SELECT jawaban_d AS numCond FROM data_latih WHERE kelas_asli=":class"', 'SELECT SUM(jawaban_d) AS numCond FROM data_latih WHERE kelas_asli=":class"');

$nb->initNumAll('SELECT COUNT(id) as numAll FROM data_latih');

// $database->query('SELECT siswa.`jenis_kelamin`, siswa.`usia`, LOWER(siswa.`sekolah`) AS sekolah, SUM(IF(jawab.`jawaban`="A", 1, 0)) AS jawaban_a, SUM(IF(jawab.`jawaban`="B", 1, 0)) AS jawaban_b, SUM(IF(jawab.`jawaban`="C", 1, 0)) AS jawaban_c, SUM(IF(jawab.`jawaban`="D", 1, 0)) AS jawaban_d FROM data_siswa siswa, jawaban_kuisioner jawab, users user WHERE user.`id_user`=siswa.`id_user` AND siswa.`id`=jawab.`id_siswa` AND user.`id_user`=:id');
$database->query('SELECT jenis_kelamin, usia, LOWER(sekolah) AS sekolah, jawaban_a, jawaban_b, jawaban_c, jawaban_d FROM data_uji WHERE id=:id');
$database->bind('id', $id_user);
$dataUji = $database->resultRow();
$nb->setParams($dataUji);

$pCX = $nb->getResult();

/*

		  $nb->getProbabilityOfConditionOnClass()
P(H|X) =  --------------------------------------- X $nb->getProbabilityOfClass()
		      $nb->getProbabilityOfCondition()


*/

// P(sanguin|sekolah)
// X = sekolah:swasta dan C = sanguin
/*$test = $nb->getProbabilityOfConditionOnClass('sekolah', 'sanguin') *
		$nb->getProbabilityOfClass('sanguin') /
		$nb->getProbabilityOfCondition('sekolah', 'swasta', 'sanguin');

var_dump($test);
var_dump($nb->resultPXC());*/




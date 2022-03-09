<?php
require BASEPATH . '/unit-test/inc/fungsi_proses.php';
require BASEPATH . '/lib/Database.php';
require BASEPATH . '/unit-test/inc/database.php';

$database = new Database();
$database->query('SELECT jenis_kelamin, usia, LOWER(sekolah) AS sekolah, jawaban_a, jawaban_b, jawaban_c, jawaban_d FROM data_uji WHERE id=1');
$data = $database->resultRow();

$db_object = new database1();
$db_object->database();
ProsesNaiveBayes($db_object, 1, $data['jenis_kelamin'], $data['usia'], $data['sekolah'], $data['jawaban_a'], $data['jawaban_b'], $data['jawaban_c'], $data['jawaban_d'], true);
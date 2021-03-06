<?php

var_dump($_POST['jawaban']);

/*isset($_POST['soal']) or exit('Failed to pass POST variable');

$database = new Database();

// --------------- START SELECT dari tabel data_siswa ---------------
$userApp = new User();
$idUser = $userApp->getId();

$database->query('SELECT id, jenis_kelamin, usia, sekolah FROM data_siswa WHERE id_user=:id');
$database->bind('id', $idUser);
$dataSiswa = $database->resultRow();
// --------------- END SELECT dari tabel data_siswa ---------------

// --------------- START INSERT data ke tabel jawaban_kuisioner ---------------
$idTabelSiswa = $dataSiswa['id'];
$values = array();
$countA = $countB = $countC = $countD = 0;

foreach($_POST['soal'] as $key => $value){
	array_push($values, "($idUser, $idTabelSiswa, $key,'$value')");
	switch($value){
		case 'A': $countA++; break;
		case 'B': $countB++; break;
		case 'C': $countC++; break;
		case 'D': $countD++; break;
	}
}

$sqlValues = implode(",", $values);
$database->query("INSERT INTO jawaban_kuisioner (id_user, id_siswa, id_soal, jawaban) VALUES $sqlValues");
$save = $database->execute();
// --------------- END INSERT data ke tabel jawaban_kuisioner ---------------

$save OR exit('Error MySQL in jawab_kuesioner.php on line ' . __LINE__ . ', query: ' . "INSERT INTO jawaban_kuisioner (id_user, id_siswa, id_soal, jawaban) VALUES $sqlValues");

// --------------- START SELECT untuk Training Set Naive Bayes ---------------
$database->query('SELECT jenis_kelamin, usia, sekolah, jawaban_a, jawaban_b, jawaban_c, jawaban_d, kelas_asli FROM data_latih');
$trainingSet = $database->resultSet();
// --------------- END SELECT untuk Training Set Naive Bayes ---------------

// --------------- START SELECT untuk Parameter Naive Bayes ---------------
$database->query('SELECT siswa.jenis_kelamin, siswa.usia, siswa.sekolah, SUM(IF(jawab.jawaban="A" AND jawab.id_siswa=1, 1, 0)) AS jawaban_a, SUM(IF(jawab.jawaban="B" AND jawab.id_siswa=1, 1, 0)) AS jawaban_b, SUM(IF(jawab.jawaban="C" AND jawab.id_siswa=1, 1, 0)) AS jawaban_c, SUM(IF(jawab.jawaban="D" AND jawab.id_siswa=1, 1, 0)) AS jawaban_d FROM data_siswa siswa, jawaban_kuisioner jawab WHERE siswa.id=:id AND jawab.id_siswa=:id');
$database->bind('id', $idTabelSiswa);
$params = $database->resultRow();
// --------------- END SELECT untuk Parameter Naive Bayes ---------------

$classes = ['Sanguin', 'Koleris', 'Melankolis', 'Plegmatis'];

// --------------- START Inisisasi Class Naive Bayes ---------------
$classes = ['Sanguin', 'Koleris', 'Melankolis', 'Plegmatis'];
$naiveBayes = new NaiveBayes($classes, 'kelas_asli', $trainingSet, $params);
$naiveBayes->setCategoryOfAttribute('jenis_kelamin', ['L', 'P']);
$naiveBayes->setCategoryOfAttribute('sekolah', ['Swasta', 'Negeri']);
// --------------- END Inisisasi Class Naive Bayes ---------------

// --------------- START Siapkan data untuk INSERT ke tabel data_hasil_klasifikasi ---------------
$nbResult = $naiveBayes->getAllParams();
$nbResult['kelas_hasil'] = $naiveBayes->getClassificationResult();
$nilai_kelas = $naiveBayes->getResultProbabilityOfClassOnCondition();
foreach($nilai_kelas as $class => $value){
	$key = 'nilai_' . strtolower($class);
	$nbResult[$key] = $value;
}
// --------------- END Siapkan data untuk INSERT ke tabel data_hasil_klasifikasi ---------------

// --------------- START INSERT data ke tabel data_hasil_klasifikasi ---------------
$database->query('INSERT INTO data_hasil_klasifikasi (id_siswa, jenis_kelamin, usia, sekolah, jawaban_a, jawaban_b, jawaban_c, jawaban_d, kelas_hasil, nilai_sanguin, nilai_koleris, nilai_melankolis, nilai_plegmatis) VALUES (:id_siswa, :jenis_kelamin, :usia, :sekolah, :jawaban_a, :jawaban_b, :jawaban_c, :jawaban_d, :kelas_hasil, :nilai_sanguin, :nilai_koleris, :nilai_melankolis, :nilai_plegmatis)');
$database->bind('id_siswa', $idTabelSiswa);
$database->bind('jenis_kelamin', $nbResult['jenis_kelamin']);
$database->bind('usia', $nbResult['usia']);
$database->bind('sekolah', $nbResult['sekolah']);
$database->bind('jawaban_a', $nbResult['jawaban_a']);
$database->bind('jawaban_b', $nbResult['jawaban_b']);
$database->bind('jawaban_c', $nbResult['jawaban_c']);
$database->bind('jawaban_d', $nbResult['jawaban_d']);
$database->bind('kelas_hasil', $nbResult['kelas_hasil']);
$database->bind('nilai_sanguin', $nbResult['nilai_sanguin']);
$database->bind('nilai_koleris', $nbResult['nilai_koleris']);
$database->bind('nilai_melankolis', $nbResult['nilai_melankolis']);
$database->bind('nilai_plegmatis', $nbResult['nilai_plegmatis']);
$save = $database->execute();
// --------------- END INSERT data ke tabel data_hasil_klasifikasi ---------------

$save OR exit('Error MySQL in jawab_kuesioner.php on line ' . __LINE__ . ', query: INSERT INTO data_hasil_klasifikasi (id_siswa, ....');

// --------------- START INSERT data ke tabel data_uji ---------------
$database->query('INSERT INTO data_uji (nama, jenis_kelamin, usia, sekolah, jawaban_a, jawaban_b, jawaban_c, jawaban_d, kelas_asli) VALUES (:nama, :jenis_kelamin, :usia, :sekolah, :jawaban_a, :jawaban_b, :jawaban_c, :jawaban_d, :kelas_asli)');
$database->bind('nama', $userApp->getName());
$database->bind('jenis_kelamin', $nbResult['jenis_kelamin']);
$database->bind('usia', $nbResult['usia']);
$database->bind('sekolah', $nbResult['sekolah']);
$database->bind('jawaban_a', $nbResult['jawaban_a']);
$database->bind('jawaban_b', $nbResult['jawaban_b']);
$database->bind('jawaban_c', $nbResult['jawaban_c']);
$database->bind('jawaban_d', $nbResult['jawaban_d']);
$database->bind('kelas_asli', $nbResult['kelas_hasil']);
$save = $database->execute();
// --------------- END INSERT data ke tabel data_uji ---------------

$save OR exit('Error MySQL in jawab_kuesioner.php on line ' . __LINE__ . ', query: INSERT INTO data_uji (nama, ....');*/

?><!-- <script type="text/javascript">
	alert("Berhasil disimpan!");
	document.location.href = "<?=BASEDOMAIN?>/hasil/my/";
</script> -->
<?php

isset($_POST['soal']) or exit('Failed to pass POST variable');

$database = $this->call('Database');
$userApp = new User();
$idUser = $userApp->getId();

$database->query('SELECT id, jenis_kelamin, usia, sekolah FROM data_siswa WHERE id_user=:id');
$database->bind('id', $idUser);
$dataSiswa = $database->resultRow();
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

$save OR exit('Error MySQL in jawab_kuesioner.php on line ' . __LINE__ . ', query: ' . "INSERT INTO jawaban_kuisioner (id_user, id_siswa, id_soal, jawaban) VALUES $sqlValues");

$nb = $this->call('NaiveBayes', ['database' => $database]);

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

$database->query('SELECT siswa.`jenis_kelamin`, siswa.`usia`, LOWER(siswa.`sekolah`) AS sekolah, SUM(IF(jawab.`jawaban`="A", 1, 0)) AS jawaban_a, SUM(IF(jawab.`jawaban`="B", 1, 0)) AS jawaban_b, SUM(IF(jawab.`jawaban`="C", 1, 0)) AS jawaban_c, SUM(IF(jawab.`jawaban`="D", 1, 0)) AS jawaban_d FROM data_siswa siswa, jawaban_kuisioner jawab, users user WHERE user.`id_user`=siswa.`id_user` AND siswa.`id`=jawab.`id_siswa` AND user.`id_user`=:id');
$database->bind('id', $idUser);
$dataUji = $database->resultRow();
$nb->setParams($dataUji);

$pCX = $nb->getResult();




$database->bind('nama', getPost('nama'));
$database->bind('username', getPost('user_name'));
$database->bind('password', password_hash(getPost('user_name'), PASSWORD_DEFAULT));
$insert = $database->execute();

if($insert){

	?><script type="text/javascript">
		alert("Berhasil disimpan!");
		document.location.href = "<?=BASEDOMAIN?>/siswa/";
	</script><?php

}else{

	?><script type="text/javascript">
		alert("Gagal disimpan!");
	</script><?php

}
<?php

$database = new Database();
$database->query('DELETE FROM users WHERE id_user=:id');
$database->bind('id', $params['id']);
$delete = $database->execute();

$delete OR exit('Failed to delete from table users in hapus_siswa.php on line ' . strval(__LINE__ - 2));

$database->query('DELETE FROM data_siswa WHERE id_user=:id');
$database->bind('id', $params['id']);
$delete = $database->execute();

$delete OR exit('Failed to delete from table data_siswa in hapus_siswa.php on line ' . strval(__LINE__ - 2));

$database->query('SELECT id FROM jawaban_kuisioner WHERE id_siswa=:id_siswa');
$database->bind('id_siswa', $params['id']);
$tblJawaban = $database->resultRow();
if(count($tblJawaban) > 0){
	$database->query('DELETE FROM jawaban_kuisioner WHERE id=:id');
	$database->bind('id', $tblJawaban['id']);
	$delete = $database->execute();

	$delete OR exit('Failed to delete from table jawaban_kuisioner in hapus_siswa.php on line ' . strval(__LINE__ - 2));
}

?><script type="text/javascript">
	alert("Berhasil dihapus!");
	document.location.href = "<?=BASEDOMAIN?>/siswa/";
</script>
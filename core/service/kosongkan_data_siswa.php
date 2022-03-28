<?php

$database = new Database();
$database->query('TRUNCATE TABLE data_siswa');
$empty = $database->execute();

$empty OR exit('Failed to TRUNCATE TABLE data_siswa ON kosongkan_data_siswa.php');

$database->query('TRUNCATE TABLE data_hasil_klasifikasi');
$empty = $database->execute();

$empty OR exit('Failed to TRUNCATE TABLE data_hasil_klasifikasi ON kosongkan_data_siswa.php');

$database->query('TRUNCATE TABLE jawaban_kuisioner');
$empty = $database->execute();

$empty OR exit('Failed to TRUNCATE TABLE jawaban_kuisioner ON kosongkan_data_siswa.php');

$database->query('DELETE FROM users WHERE level=:level');
$database->bind('level', USER_LEVEL_SISWA);
$empty = $database->execute();

$empty OR exit('Failed to DELETE FROM users... ON kosongkan_data_siswa.php');

?><script type="text/javascript">
	alert("Berhasil dihapus!");
	document.location.href = "<?=BASEDOMAIN?>/siswa/";
</script><?php
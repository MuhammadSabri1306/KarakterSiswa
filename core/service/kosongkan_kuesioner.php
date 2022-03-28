<?php

$database = new Database();
$database->query('TRUNCATE TABLE data_soal');
$empty = $database->execute();

$empty OR exit('Failed to TRUNCATE table data_soal in kosongkan_kuesioner.php on line ' . strval(__LINE__ - 2));

?><script type="text/javascript">
	alert("Berhasil dihapus!");
	document.location.href = "<?=BASEDOMAIN?>/kuesioner/";
</script>
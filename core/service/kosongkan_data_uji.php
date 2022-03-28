<?php

$database = new Database();
$database->query('TRUNCATE TABLE data_uji');
$empty = $database->execute();

$empty OR exit('Failed to TRUNCATE table data_uji in kosongkan_data_uji.php on line ' . strval(__LINE__ - 2));

?><script type="text/javascript">
	alert("Berhasil dihapus!");
	document.location.href = "<?=BASEDOMAIN?>/akurasi/";
</script>
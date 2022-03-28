<?php

$database = new Database();
$database->query('TRUNCATE TABLE data_latih');
$empty = $database->execute();

$empty OR exit('Failed to TRUNCATE table data_latih in kosongkan_data_training.php on line ' . strval(__LINE__ - 2));

?><script type="text/javascript">
	alert("Berhasil dihapus!");
	document.location.href = "<?=BASEDOMAIN?>/training/";
</script>
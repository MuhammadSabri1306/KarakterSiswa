<?php

$database = $this->call('Database');
$database->query('TRUNCATE TABLE data_soal');
$empty = $database->execute();

if($empty){

	?><script type="text/javascript">
		alert("Berhasil dihapus!");
		document.location.href = "<?=BASEDOMAIN?>/kuesioner/";
	</script><?php

}else{

	?><script type="text/javascript">
		alert("Gagal dihapus!");
	</script><?php

}
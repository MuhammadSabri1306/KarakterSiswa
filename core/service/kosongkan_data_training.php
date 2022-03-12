<?php

$database = new Database();
$database->query('TRUNCATE TABLE data_latih');
$empty = $database->execute();

if($empty){

	?><script type="text/javascript">
		alert("Berhasil dihapus!");
		document.location.href = "<?=BASEDOMAIN?>/training/";
	</script><?php

}else{

	?><script type="text/javascript">
		alert("Gagal dihapus!");
	</script><?php

}
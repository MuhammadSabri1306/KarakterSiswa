<?php

$database = new Database();
$database->query('TRUNCATE TABLE data_uji');
$empty = $database->execute();

if($empty){

	?><script type="text/javascript">
		alert("Berhasil dihapus!");
		document.location.href = "<?=BASEDOMAIN?>/akurasi/";
	</script><?php

}else{

	?><script type="text/javascript">
		alert("Gagal dihapus!");
	</script><?php

}
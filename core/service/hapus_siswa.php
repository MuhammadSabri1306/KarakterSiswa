<?php

$database = $this->call('Database');
$database->query('DELETE FROM users WHERE id_user=:id');
$database->bind('id', $params['id']);
$delete = $database->execute();

if($delete){
	$database->query('DELETE FROM data_siswa WHERE id_user=:id');
	$database->bind('id', $params['id']);
	$delete = $database->execute();
}

if($delete){

	?><script type="text/javascript">
		alert("Berhasil dihapus!");
		document.location.href = "<?=BASEDOMAIN?>/siswa/";
	</script><?php

}else{

	?><script type="text/javascript">
		alert("Gagal dihapus!");
	</script><?php

}
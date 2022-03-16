<?php

$database = new Database();
$database->query('SELECT level FROM users WHERE id_user=:id');
$database->bind('id', $params['id']);
$level = $database->resultRow()['level'];
$isAdmin = true;

if($level == USER_LEVEL_SISWA){
	
	$query = 'DELETE FROM users, data_siswa, jawaban_kuisioner, data_hasil_klasifikasi WHERE users.id_user=:id AND data_siswa.id_user=:users.id_user AND data_siswa.id_user=data_siswa.id_user AND data_hasil_klasifikasi.id_siswa=data_siswa.id';
	$isAdmin = false;

}elseif($level == USER_LEVEL_GURU){

	$query = 'DELETE FROM users WHERE id_user=:id';
	$isAdmin = false;

}

if(!$isAdmin){
	$database->query($query);
	$database->bind('id', $params['id']);
	$delete = $database->execute();
}

if($isAdmin){

	?><script type="text/javascript">
		alert("Tidak dapat menghapus user Admin!");
		document.location.href = "<?=BASEDOMAIN?>/users/";
	</script><?php

}elseif(!$isAdmin && $delete){

	?><script type="text/javascript">
		alert("Berhasil dihapus!");
		document.location.href = "<?=BASEDOMAIN?>/users/";
	</script><?php

}else{

	?><script type="text/javascript">
		alert("Gagal dihapus!");
	</script><?php

}
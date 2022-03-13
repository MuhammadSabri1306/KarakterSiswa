<?php

isset($_POST['nama'], $_POST['user_name'], $_POST['pass1'], $_POST['pass2'], $_POST['edit']) or exit('Failed to pass POST variable');

function getPost($name){
	return strip_tags(trim($_POST[$name]));
}

$id = getPost('edit');
$database = new Database();
$database->query('SELECT IF(level=:level, 1, 0) AS isSiswa FROM users WHERE id_user=:id');
$database->bind('level', USER_LEVEL_SISWA);
$database->bind('id', $id);

$isSiswa = $database->resultRow()['isSiswa'];
$username = getPost('user_name');
$nama = getPost('nama');
$pass1 = getPost('pass1');
$pass2 = getPost('pass2');

$database->query('UPDATE users SET nama=:nama, username=:username WHERE id_user=:id');
$database->bind('nama', $nama);
$database->bind('username', $username);
$database->bind('id', $id);
$update = $database->execute();

if(strlen($pass1) && $pass1 == $pass2){
	$update OR exit('Failed to update table users at edit_users.php, from line ' . __LINE__);

	$database->query('UPDATE users SET password=:password WHERE id_user=:id');
	$database->bind('password', password_hash($pass1, PASSWORD_DEFAULT));
	$database->bind('id', $id);
	$update = $database->execute();
}

if($isSiswa){
	$update OR exit('Failed to update table users at edit_users.php, from line ' . __LINE__);

	$database->query('UPDATE data_siswa SET nama_siswa=:nama WHERE id_user=:id');
	$database->bind('nama', $nama);
	$database->bind('id', $id);
	$update = $database->execute();
}

if($update){

	?><script type="text/javascript">
		alert("Berhasil disimpan!");
		document.location.href = "<?=BASEDOMAIN?>/users/details/<?=$id?>";
	</script><?php

}else{

	?><script type="text/javascript">
		alert("Gagal disimpan!");
	</script><?php

}
<?php

isset($_POST['nama'], $_POST['nis'], $_POST['user_name'], $_POST['jenis_kelamin'], $_POST['usia'], $_POST['sekolah'], $_POST['nama_orgtua'], $_POST['telp_orgtua'], $_POST['edit']) or exit('Failed to pass POST variable');

function getPost($name){
	return strip_tags(trim($_POST[$name]));
}

$id = $_POST['edit'];
$database = new Database();
$database->query('UPDATE users SET nama=:nama, username=:username WHERE id_user=:id');

$database->bind('nama', getPost('nama'));
$database->bind('username', getPost('user_name'));
$database->bind('id', $id);
$update = $database->execute();

$update OR exit('Failed to update table users in edit_siswa.php on line ' . strval(__LINE__ - 2));

$database->query('UPDATE data_siswa SET nama_siswa=:nama, nis=:nis, jenis_kelamin=:jkel, usia=:usia, sekolah=:sekolah, nama_orgtua=:nama_orgtua, telp_orgtua=:telp_orgtua WHERE id_user=:id');
$database->bind('nama', getPost('nama'));
$database->bind('nis', getPost('nis'));
$database->bind('jkel', getPost('jenis_kelamin'));
$database->bind('usia', getPost('usia'), PDO::PARAM_INT);
$database->bind('sekolah', getPost('sekolah'));
$database->bind('nama_orgtua', getPost('nama_orgtua'));
$database->bind('telp_orgtua', getPost('telp_orgtua'));
$database->bind('id', $id);
$update = $database->execute();

$update OR exit('Failed to update table data_siswa in edit_siswa.php on line ' . strval(__LINE__ - 2));

$database->query('UPDATE data_uji INNER JOIN data_siswa ON data_siswa.`id`=data_uji.`id_siswa` SET data_uji.`nama`=:nama WHERE data_siswa.`id_user`=:id');
$database->bind('nama', getPost('nama'));
$database->bind('id', $id);
$update = $database->execute();

$update OR exit('Failed to update table data_uji in edit_siswa.php on line ' . strval(__LINE__ - 2));

?><script type="text/javascript">
	alert("Berhasil disimpan!");
	document.location.href = "<?=BASEDOMAIN?>/siswa/details/<?=$id?>";
</script>
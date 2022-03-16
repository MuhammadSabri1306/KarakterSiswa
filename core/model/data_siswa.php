<?php

$database = new Database();
$database->query('SELECT siswa.*, usr.username FROM data_siswa siswa, users usr WHERE siswa.`id_user` = usr.`id_user`');

$data = array('jumlah' => $database->numRows());
if($data['jumlah'] > 0){
	$data['siswa'] = $database->resultSet();
}

for($i=0; $i<count($data['siswa']); $i++){
	$data['siswa'][$i]['telp_orgtua'] = whatsappNumberFormat($data['siswa'][$i]['telp_orgtua']);
}

// data dari form Users ketika menambah users Siswa: nama, username
$data['dataFromFormUsers'] = null;
if(isset($_SESSION['dataUsersToDataSiswa']) && !is_null($_SESSION['dataUsersToDataSiswa'])){

	if(is_array($_SESSION['dataUsersToDataSiswa'])){
		$data['dataFromFormUsers'] = $_SESSION['dataUsersToDataSiswa'];
	}
	
	$_SESSION['dataUsersToDataSiswa'] = null;
	unset($_SESSION['dataUsersToDataSiswa']);

}
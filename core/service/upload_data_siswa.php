<?php

isset($_FILES['file_data_siswa']) or exit('Failed to pass POST variable');

$database = new Database();
$excel = ExcelReader::init($_FILES['file_data_siswa']['tmp_name']);

$row = $excel->rowcount($sheet_index = 0);
$errorRow = -1;

for($i=2; $i<=$row; $i++){
    if(!empty($excel->val($i, 2))){

    	$nama = $excel->val($i, 2);
    	$nis = $excel->val($i, 3);
    	$username = $excel->val($i, 4);
    	$jenis_kelamin = $excel->val($i, 5);
    	$usia = $excel->val($i, 6);
    	$sekolah = $excel->val($i, 7);
    	$nama_orgtua = $excel->val($i, 8);
    	$telp_orgtua = $excel->val($i, 9);

    	$database->query('INSERT INTO users (nama, username, password, level) VALUES (:nama, :username, :password, 2)');
		$database->bind('nama', $nama);
		$database->bind('username', $username);
		$database->bind('password', password_hash($username, PASSWORD_DEFAULT));
		$insertItem = $database->execute();

		if($errorRow < 0 && !$insertItem){
        	$errorRow = $i;
        }
        if(!$insertItem){
        	echo '<br>Errow INSERT to table users in upload_data_siswa.php where $i=' . $i;
        }else{

        	$lasInsertedId = $database->lastInsertId();
        	$database->query('INSERT INTO data_siswa (nama_siswa, nis, jenis_kelamin, usia, sekolah, id_user, nama_orgtua, telp_orgtua) VALUES (:nama, :nis, :jkel, :usia, :sekolah, :id, :nama_orgtua, :telp_orgtua)');
			$database->bind('nama', $nama);
			$database->bind('nis', $nis);
			$database->bind('jkel', $jenis_kelamin);
			$database->bind('usia', $usia);
			$database->bind('sekolah', $sekolah);
			$database->bind('id', $lasInsertedId);
			$database->bind('nama_orgtua', $nama_orgtua);
			$database->bind('telp_orgtua', $telp_orgtua);

			$insertItem = $database->execute();
			if(!$insertItem){
	        	echo '<br>Errow INSERT to table data_siswa in upload_data_siswa.php where $i=' . $i;
	        }
        }
    }
}

if($errorRow < 0){

	?><script type="text/javascript">
		alert("Berhasil disimpan!");
		document.location.href = "<?=BASEDOMAIN?>/siswa/";
	</script><?php

}else{

	?><script type="text/javascript">
		alert("Gagal disimpan!");
	</script><?php
	echo "<br><br>There an error in excel row's loop while i=$i.";

}

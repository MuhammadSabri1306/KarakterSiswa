<?php

isset($_FILES['file_data_latih']) or exit('Failed to pass POST variable');

$database = new Database();
$excel = ExcelReader::init($_FILES['file_data_kuesioner']['tmp_name']);

$row = $excel->rowcount($sheet_index = 0);
// $column = $excel->colcount($sheet_index = 0);
$errorRow = -1;

//import data excel dari baris kedua, karena baris pertama adalah nama kolom
for($i=2; $i<=$row; $i++){
    if(!empty($excel->val($i, 2))){

        $database->query('INSERT INTO data_latih (nama, jenis_kelamin, usia, sekolah, jawaban_a, jawaban_b, jawaban_c, jawaban_d, kelas_asli) VALUES (:nama, :jkel, :usia, :sekolah, :a, :b, :c, :d, :kelas)');

        $database->bind('nama', $excel->val($i, 2));
        $database->bind('jkel', $excel->val($i, 3));
        $database->bind('usia', $excel->val($i, 4));
        $database->bind('sekolah', $excel->val($i, 5));
        $database->bind('a', $excel->val($i, 6));
        $database->bind('b', $excel->val($i, 7));
        $database->bind('c', $excel->val($i, 8));
        $database->bind('d', $excel->val($i, 9));
        $database->bind('kelas', $excel->val($i, 10));

        $insertItem = $database->execute();
        if($errorRow < 0 && !$insertItem){
        	$errorRow = $i;
        }
    }
}

if($errorRow < 0){

	?><script type="text/javascript">
		alert("Berhasil disimpan!");
		document.location.href = "<?=BASEDOMAIN?>/training/";
	</script><?php

}else{

	?><script type="text/javascript">
		alert("Gagal disimpan!");
	</script><?php
	echo "There an error in excel row's loop while i=$i.";

}
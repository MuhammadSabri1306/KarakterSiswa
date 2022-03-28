<?php

isset($_FILES['file_data_kuesioner']) or exit('Failed to pass POST variable');

$database = new Database();
$excel = ExcelReader::init($_FILES['file_data_kuesioner']['tmp_name']);

$row = $excel->rowcount($sheet_index = 0);
$errorRow = -1;

for($i=2; $i<=$row; $i++){
    if(!empty($excel->val($i, 2))){

        $database->query('INSERT INTO data_soal (keyword, tipe_karakter, kategori, keterangan) VALUES (:keyword, :tipe_karakter, :kategori, :keterangan)');
    	$database->bind('keyword', $excel->val($i, 2));
    	$database->bind('tipe_karakter', $excel->val($i, 3));
    	$database->bind('kategori', $excel->val($i, 4));
    	$database->bind('keterangan', $excel->val($i, 5));

        $insertItem = $database->execute();
        if($errorRow < 0 && !$insertItem){
            $errorRow = $i;
        }

    }
}

if($errorRow < 0){

	?><script type="text/javascript">
		alert("Berhasil disimpan!");
		document.location.href = "<?=BASEDOMAIN?>/kuesioner/";
	</script><?php

}else{

    ?><script type="text/javascript">
        alert("Gagal disimpan!");
    </script><?php
    echo "There an error in excel row's loop while i=$i.";

}
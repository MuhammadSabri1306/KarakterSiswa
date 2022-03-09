<?php

isset($_FILES['file_data_kuesioner']) or exit('Failed to pass POST variable');

$database = $this->call('Database');
$excel = $this->call('ExcelReader', array('filepath' => $_FILES['file_data_kuesioner']['tmp_name']));

$row = $excel->rowcount($sheet_index = 0);
$errorRow = -1;

for($i=2; $i<=$row; $i++){
    if(!empty($excel->val($i, 2))){

        $database->query('INSERT INTO data_soal (pilihan_a, pilihan_b, pilihan_c, pilihan_d) VALUES (:a, :b, :c, :d)');

        $database->bind('a', $excel->val($i, 2));
        $database->bind('b', $excel->val($i, 3));
        $database->bind('c', $excel->val($i, 4));
        $database->bind('d', $excel->val($i, 5));

        $insert = $database->execute();
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
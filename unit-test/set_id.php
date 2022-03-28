<?php
require BASEPATH . '/lib/Database.php';
$database = new Database();

$val = 2;
for($i=42; $i<=200; $i++){

	$database->query('UPDATE data_soal SET id=:val WHERE id=:id');
	$database->bind('val', $val);
	$database->bind('id', $i);
	// $database->execute();

	$val++;
}
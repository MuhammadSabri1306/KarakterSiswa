<?php

$database = $this->call('Database');
$database->query('SELECT siswa.*, usr.username FROM data_siswa siswa, users usr WHERE siswa.`id_user`=usr.`id_user` AND siswa.`id_user`=:id');
$database->bind('id', $params['id']);

$data = array('siswa' => $database->resultRow());
<?php

$database = new Database();
$database->query('SELECT id_user, nama, username FROM users WHERE id_user=:id');
$database->bind('id', $params['id']);

$data = array('user' => $database->resultRow());
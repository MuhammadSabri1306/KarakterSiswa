<?php
$pass = 'sabri';

$hashed = password_hash($pass, PASSWORD_DEFAULT);
var_dump($hashed);
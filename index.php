<?php

session_start();
error_reporting(-1);
// error_reporting(0);

require 'init.php';
$appUser = new User();
$app = new App();
$app->run();
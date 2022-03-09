<?php

/*
 * SITE'S BASE SETUP
 *
 */
define('BASEDOMAIN', 'http://localhost/naivebayes');
define('BASEPATH', __DIR__ . '/..');
define('DEFAULT_ERROR_PAGE', BASEDOMAIN . '/e404');
define('DEFAULT_KICK_PAGE', DEFAULT_ERROR_PAGE);
define('DEFAULT_VIEW_ASSETS_URL', BASEDOMAIN . '/public/assets');
define('DEFAULT_VIEW_VENDOR_URL', BASEDOMAIN . '/public/vendor');
define('TEMPLATE_SECTION_FULL', 'full');
define('TEMPLATE_SECTION_OPEN', 'open');
define('TEMPLATE_SECTION_CLOSE', 'close');
define('PRODUCTION_MODE', false);

/*
 * USER LEVEL
 *
 */
define('USER_LEVEL_UNKNOWN', 0);
define('USER_LEVEL_ADMIN', 1);
define('USER_LEVEL_SISWA', 2);
define('USER_LEVEL_GURU', 3);

/*
 * DATABASE CONFIGURATION
 *
 */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'naivebayes');
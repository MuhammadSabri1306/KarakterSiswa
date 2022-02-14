<?php
/**
 * 
 */
class LoginTemplate
{
	public $title = 'Klasifikasi Naive Bayes';
	public $favicon = 'img/favicon.ico';

	function header($type = TEMPLATE_SECTION_FULL){
		if($type == TEMPLATE_SECTION_FULL || $type == TEMPLATE_SECTION_OPEN){

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?=$this->title?></title>
    <link rel="icon" type="image/x-icon" href="<?=DEFAULT_VIEW_ASSETS_URL?>/<?=$this->favicon?>"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="<?=DEFAULT_VIEW_VENDOR_URL?>/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?=DEFAULT_VIEW_ASSETS_URL?>/css/plugins.css" rel="stylesheet"/>
    <link href="<?=DEFAULT_VIEW_ASSETS_URL?>/css/form-2.css" rel="stylesheet"/>
    <link href="<?=DEFAULT_VIEW_ASSETS_URL?>/css/theme-checkbox-radio.css" rel="stylesheet"/>
    <link href="<?=DEFAULT_VIEW_ASSETS_URL?>/css/switches.css" rel="stylesheet"/>
    <link href="<?=DEFAULT_VIEW_ASSETS_URL?>/css/styles_custom.css" rel="stylesheet"/><?php

    	}

    	if($type == TEMPLATE_SECTION_FULL || $type == TEMPLATE_SECTION_CLOSE){

?></head>
<body class="form">
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap"><?php

    	}

	}

	function footer($type = TEMPLATE_SECTION_FULL){
		
		if($type == TEMPLATE_SECTION_FULL || $type == TEMPLATE_SECTION_OPEN){

			?></div>
        </div>
    </div>
    <script src="<?=DEFAULT_VIEW_VENDOR_URL?>/jquery/jquery-3.1.1.min.js"></script>
    <script src="<?=DEFAULT_VIEW_VENDOR_URL?>/popper/popper.min.js"></script>
    <script src="<?=DEFAULT_VIEW_VENDOR_URL?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=DEFAULT_VIEW_ASSETS_URL?>/js/form-2.js"></script><?php

    	}

    	if($type == TEMPLATE_SECTION_FULL || $type == TEMPLATE_SECTION_CLOSE){

?></body>
</html><?php

		}
	}

}
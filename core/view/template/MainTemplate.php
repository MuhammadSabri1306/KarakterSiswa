<?php
/**
 * 
 */
class MainTemplate
{
	public $title = 'Klasifikasi Naive Bayes';
	public $favicon = 'img/favicon.ico';
	public $activeNav = 0;

	private function getMenuList(){
		$appUser = new User();
		if($appUser->getLevel() == USER_LEVEL_UNKNOWN){

			return array(array('url' => 'login.php', 'title' => 'Masuk'));

		}elseif($appUser->getLevel() == USER_LEVEL_ADMIN){

			return array(
				array('url' => 'siswa', 'title' => 'Data Siswa'),
				array('url' => 'training', 'title' => 'Data Latih'),
				array('url' => 'kuesioner', 'title' => 'Data Soal'),
				array('url' => 'akurasi', 'title' => 'Uji Akurasi'),
				array('url' => 'klasifikasi', 'title' => 'Hasil Klasifikasi'),
				array('url' => 'logout', 'title' => 'Keluar')
			);

		}
	}

	private function createMenu(){
		$menu = $this->getMenuList();
		for($i=0; $i<count($menu); $i++){

				?><li class="menu">
					<a class="<?=($i != $this->activeNav) ? 'dropdown-toggle' : ''?>" href="<?=BASEDOMAIN?>/<?=$menu[0]['url']?>" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
							<span><?=$menu[0]['title']?></span>
						</div>
					</a>
				</li><?php

		}
	}

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
    <link href="<?=DEFAULT_VIEW_VENDOR_URL?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=DEFAULT_VIEW_ASSETS_URL?>/css/plugins.css?v=2" rel="stylesheet" type="text/css" />
    <link href="<?=DEFAULT_VIEW_VENDOR_URL?>/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="<?=DEFAULT_VIEW_ASSETS_URL?>/css/dash_2.css" rel="stylesheet" type="text/css" /><?php

    	}

    	if($type == TEMPLATE_SECTION_FULL || $type == TEMPLATE_SECTION_CLOSE){

?></head>
<body><div class="main-container sbar-open">
	<div class="sidebar-wrapper sidebar-theme">
		<nav id="sidebar">
			<ul class="list-unstyled menu-categories" id="accordionExample">
                <li class="menu">
                	<a class='menu-top-active' href="<?=BASEDOMAIN?>/home" class="dropdown-toggle">
                        <span class="d-block">Menu</span>
                    </a>
                    <!-- <a class='menu-top-active' 
                    href="index.php" data-active="true" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <span>Menu</span>
                        </div>
                    </a> -->
                </li><?php

		$this->createMenu();

			?></ul>
        </nav>
    </div>
    <div id="content" class="main-content">
    	<div class="content-wrapper"><?php

    	}

	}

	function footer($type = TEMPLATE_SECTION_FULL){
		
		if($type == TEMPLATE_SECTION_FULL || $type == TEMPLATE_SECTION_OPEN){

		?></div>
		<div class="footer-wrapper justify-content-center">
			<div class="footer-section">
				<p class="mt-5">Copyright © 2022 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
			</div>
		</div>
	</div>
</div>
    <script src="<?=DEFAULT_VIEW_VENDOR_URL?>/jquery/jquery-3.1.1.min.js"></script>
    <script src="<?=DEFAULT_VIEW_VENDOR_URL?>/popper/popper.min.js"></script>
    <script src="<?=DEFAULT_VIEW_VENDOR_URL?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=DEFAULT_VIEW_VENDOR_URL?>/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?=DEFAULT_VIEW_ASSETS_URL?>/js/app.js"></script>
    <script> $(document).ready(function() { App.init(); }); </script>
    <script src="<?=DEFAULT_VIEW_ASSETS_URL?>/js/custom.js"></script>
    <script src="<?=DEFAULT_VIEW_VENDOR_URL?>/apex/apexcharts.min.js"></script>
    <script src="<?=DEFAULT_VIEW_ASSETS_URL?>/js/dash_2.js"></script><?php

    	if($type == TEMPLATE_SECTION_FULL || $type == TEMPLATE_SECTION_CLOSE){

?></body>
</html><?php

		}

	}
}
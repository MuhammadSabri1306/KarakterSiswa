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

			return array(
				array('url' => 'home', 'title' => 'Beranda', 'icon' => 'fas fa-home'),
				array('url' => 'login', 'title' => 'Masuk', 'icon' => 'fas fa-key')
			);

		}elseif($appUser->getLevel() == USER_LEVEL_ADMIN){

			return array(
				array('url' => 'home', 'title' => 'Beranda', 'icon' => 'fas fa-home'),
				array('url' => 'siswa', 'title' => 'Data Siswa', 'icon' => 'fas fa-child'),
				array('url' => 'training', 'title' => 'Data Latih', 'icon' => 'fas fa-lightbulb'),
				array('url' => 'kuesioner', 'title' => 'Kuesioner', 'icon' => 'fas fa-question-circle'),
				array('url' => 'akurasi', 'title' => 'Uji Akurasi', 'icon' => 'fas fa-child'),
				array('url' => 'hasil', 'title' => 'Hasil Klasifikasi', 'icon' => 'fas fa-bookmark'),
				array('url' => 'users', 'title' => 'Data Pengguna', 'icon' => 'fas fa-user'),
				array('url' => 'logout', 'title' => 'Keluar', 'icon' => 'fas fa-power-off')
			);

		}elseif($appUser->getLevel() == USER_LEVEL_SISWA){

			return array(
				array('url' => 'home', 'title' => 'Beranda', 'icon' => 'fas fa-home'),
				array('url' => 'siswa/my', 'title' => 'Data Siswa', 'icon' => 'fas fa-child'),
				array('url' => 'kuesioner/analyze', 'title' => 'Kuesioner', 'icon' => 'fas fa-question-circle'),
				array('url' => 'hasil/my', 'title' => 'Hasil Klasifikasi', 'icon' => 'fas fa-bookmark'),
				array('url' => 'logout', 'title' => 'Keluar', 'icon' => 'fas fa-power-off')
			);

		}

		elseif($appUser->getLevel() == USER_LEVEL_GURU){

			return array(
				array('url' => 'home', 'title' => 'Beranda', 'icon' => 'fas fa-home'),
				array('url' => 'siswa', 'title' => 'Data Siswa', 'icon' => 'fas fa-child'),
				array('url' => 'hasil', 'title' => 'Hasil Klasifikasi', 'icon' => 'fas fa-bookmark'),
				array('url' => 'logout', 'title' => 'Keluar', 'icon' => 'fas fa-power-off')
			);

		}
	}

	private function createMenu(){
		$menu = $this->getMenuList();
		for($i=0; $i<count($menu); $i++){

				?><li class="menu">
					<a href="<?=BASEDOMAIN?>/<?=$menu[$i]['url']?>" class="dropdown-toggle"<?=($i == $this->activeNav) ? ' data-active="true"' : ''?> aria-expanded="false">
						<div>
							<i class="<?=$menu[$i]['icon']?>"></i>
							<span><?=$menu[$i]['title']?></span>
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
    <link href="<?=DEFAULT_VIEW_VENDOR_URL?>/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?=DEFAULT_VIEW_VENDOR_URL?>/fontawesome/css/all.min.css" rel="stylesheet"/>
    <link href="<?=DEFAULT_VIEW_ASSETS_URL?>/css/plugins.css?v=2" rel="stylesheet"/>
    <link href="<?=DEFAULT_VIEW_VENDOR_URL?>/apex/apexcharts.css" rel="stylesheet">
    <link href="<?=DEFAULT_VIEW_ASSETS_URL?>/css/dash_2.css" rel="stylesheet"/><?php

    	}

    	if($type == TEMPLATE_SECTION_FULL || $type == TEMPLATE_SECTION_CLOSE){

?></head>
<body><div class="main-container sbar-open">
	<div class="sidebar-wrapper sidebar-theme">
		<nav id="sidebar">
			<ul class="list-unstyled menu-categories" id="accordionExample">
                <li class="menu">
                	<h4 class="mb-4"><b>Navigation</b></h4>
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
				<p class="mt-5 font-weight-bold">Copyright &copy; 2022 Universitas Dipa Makassar.</p>
			</div>
		</div>
	</div>
</div>
    <script src="<?=DEFAULT_VIEW_VENDOR_URL?>/jquery/jquery-3.1.1.min.js"></script>
    <script src="<?=DEFAULT_VIEW_VENDOR_URL?>/popper/popper.min.js"></script>
    <script src="<?=DEFAULT_VIEW_VENDOR_URL?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=DEFAULT_VIEW_VENDOR_URL?>/fontawesome/js/all.min.js"></script>
    <script src="<?=DEFAULT_VIEW_VENDOR_URL?>/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?=DEFAULT_VIEW_ASSETS_URL?>/js/app.js"></script>
    <script> $(document).ready(function() { App.init(); }); </script>
    <script src="<?=DEFAULT_VIEW_ASSETS_URL?>/js/custom.js"></script>
    <script src="<?=DEFAULT_VIEW_VENDOR_URL?>/apex/apexcharts.min.js"></script>
    <script src="<?=DEFAULT_VIEW_ASSETS_URL?>/js/dash_2.js"></script><?php

    	}

    	if($type == TEMPLATE_SECTION_FULL || $type == TEMPLATE_SECTION_CLOSE){

?></body>
</html><?php

		}
	}

}
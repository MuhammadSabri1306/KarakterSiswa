<?php

class UnitTest
{
	protected function run($unit){
		if(PRODUCTION_MODE){
			exit('PRODUCTION MODE IS ON');
		}

		$unit = "/unit-test/$unit.php";
		file_exists(BASEPATH . $unit) or exit('Unit test cannot found: ' . $unit);

		include BASEPATH . $unit;
	}
}


class Test extends UnitTest
{
	function view_kuesioner(){
		$this->run('view_kuesioner');
	}

	function view_data_latih(){
		$this->run('view_data_latih');
	}

	function naive_bayes(){
		$this->run('naive_bayes');
	}

	function naive_bayes1(){
		$this->run('naive_bayes1');
	}

	function naive_bayes2(){
		$this->run('naive_bayes2');
	}

	function or_implem(){
		$this->run('or_implem');
	}

	function find_table(){
		$this->run('find_array_table');
	}

	function uji_akurasi(){
		$this->run('uji_akurasi');
	}

	function returned_by_constructor(){
		$this->run('returned_by_constructor');
	}

	function create_post(){
		$this->run('create_post');
	}

	function create_passhash(){
		$this->run('create_passhash');
	}

	function download_file(){
		$this->run('download_file');
	}

	function set_id(){
		$this->run('set_id');
	}

	function change_nis(){
		$this->run('changeNIS');
	}
}

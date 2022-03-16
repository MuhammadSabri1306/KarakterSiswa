<?php
/**
 * 
 */
class Download extends Controller
{
	function excel_template_data_siswa(){
		$this->setVisibility(USER_LEVEL_ADMIN, USER_LEVEL_GURU);

		$this->use('DownloadFileRequest');
		$this->getService('download_excel_template', ['filename' => 'TEMPLATE - Data Siswa.xls']);
	}

	function excel_template_data_latih(){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$this->use('DownloadFileRequest');
		$this->getService('download_excel_template', ['filename' => 'TEMPLATE - Data Latih.xls']);
	}

	function excel_template_kuesioner(){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$this->use('DownloadFileRequest');
		$this->getService('download_excel_template', ['filename' => 'TEMPLATE - Soal Kuesioner.xls']);
	}

	function excel_template_data_uji(){
		$this->setVisibility(USER_LEVEL_ADMIN);

		$this->use('DownloadFileRequest');
		$this->getService('download_excel_template', ['filename' => 'TEMPLATE - Data Uji (Siswa).xls']);
	}
}
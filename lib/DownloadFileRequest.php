<?php
/**
 * 
 */
class DownloadFileRequest
{
	private $path;
	public $contentDescription;
	public $contentType;
	public $cacheControl;
	public $expires;
	public $contentDisposition;
	private $contentLength;
	public $pragma;

	function __construct($filePath){
		$this->filePath = $filePath;

		if(file_exists($filePath)){
			$this->contentDisposition = 'attachment; filename="' . basename($filePath) . '"';
			$this->contentLength = filesize($filePath);
		}
	}

	function getHeaders(){
		return array(
			'Content-Description' => $this->contentDescription,
			'Content-Type' => $this->contentType,
			'Cache-Control' => $this->cacheControl,
			'Expires' => $this->expires,
			'Content-Disposition' => $this->contentDisposition,
			'Content-Length' => $this->contentLength,
			'Pragma' => $this->pragma
		);
	}

	private function getDefaultErrorMessage(){
		return function(){
			exit("The file's path doesn't exists!");
		};
	}

	private function setupServerHeader(){
		foreach($this->getHeaders() as $key => $val){

			if(!is_null($val)){
				header($key . ':' . $val);
			}else{
				echo "The header key '$key' is null/undefined";
			}

		}
	}

	function buildResponse($errorCallback = null){
		if(is_null($errorCallback)){
			$errorCallback = $this->getDefaultErrorMessage();
		}

		$success = file_exists($this->filePath);

		if(!$success){
			$errorCallback();
		}else{

			$this->setupServerHeader();
			flush();
			readfile($this->filePath);

		}

		return $success;
	}
}
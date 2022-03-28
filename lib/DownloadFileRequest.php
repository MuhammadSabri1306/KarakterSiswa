<?php
/**
 * A PHP template for preparing Response of File Download Request easily
 * @source https://github.com/MuhammadSabri1306/...
 * @author Muhammad Sabri <muhammadsabri1306@gmail.com>
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

	/**
	 * @param String $filePath
	 */
	function __construct($filePath){
		$this->filePath = $filePath;

		if(file_exists($filePath)){
			$this->contentDisposition = 'attachment; filename="' . basename($filePath) . '"';
			$this->contentLength = filesize($filePath);
		}
	}

	/**
	 * Setup the MySQL's query of for operation
	 * @return Array
	 */
	function getHeaders(){
		$headers = array();

		!is_null($this->contentDescription) AND $headers['Content-Description'] = $this->contentDescription;
		!is_null($this->contentType) AND $headers['Content-Type'] = $this->contentType;
		!is_null($this->cacheControl) AND $headers['Cache-Control'] = $this->cacheControl;
		!is_null($this->expires) AND $headers['Expires'] = $this->expires;
		!is_null($this->contentDisposition) AND $headers['Content-Disposition'] = $this->contentDisposition;
		!is_null($this->contentLength) AND $headers['Content-Length'] = $this->contentLength;
		!is_null($this->pragma) AND $headers['Pragma'] = $this->pragma;

		return $headers;
	}

	/**
	 * Print error message and stop the program
	 */
	private function getDefaultErrorMessage(){
		return function(){
			exit("The file's path doesn't exists!");
		};
	}

	/**
	 * Set all headers property used to provide File Download Response
	 */
	private function setupServerHeader(){
		foreach($this->getHeaders() as $key => $val){

			if(!is_null($val)){
				header($key . ':' . $val);
			}else{
				echo "The header key '$key' is null/undefined";
			}

		}
	}

	/**
	 * Build the Response of File Download Request
	 * @return Boolean
	 */
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
<?php

require BASEPATH . '/lib/DownloadFileRequest.php';

$request = new DownloadFileRequest(BASEPATH . '/public/excel/2. Data Soal Kuisioner.xls');
$request->contentDescription = 'File Transfer';
$request->contentType = 'application/octet-stream';
$request->cacheControl = 'no-cache, must-revalidate';
$request->expires = 0;
$request->pragma = 'public';
$request->buildResponse();
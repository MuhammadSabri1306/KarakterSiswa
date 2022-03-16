<?php

$request = new DownloadFileRequest(BASEPATH . '/public/excel/' . $params['filename']);
$request->contentDescription = 'File Transfer';
$request->contentType = 'application/octet-stream';
$request->cacheControl = 'no-cache, must-revalidate';
$request->expires = 0;
$request->pragma = 'public';
$request->buildResponse();
<?php

/*isset($params['filepath']) or exit('Undefined params:filepath!');

require BASEPATH . '/lib/ExcelReader/excel_reader2.php';
$called = new Spreadsheet_Excel_Reader($params['filepath']);*/

require BASEPATH . '/lib/ExcelReader/excel_reader2.php';
/**
 * 
 */
class ExcelReader
{
	public static function init($filepath){
		return new Spreadsheet_Excel_Reader($filepath);
	}
}
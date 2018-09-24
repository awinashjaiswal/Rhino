<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PhpExcel
{
	public function __construct($filename)
	{
		$this->filename=$filename;
		$this->spreadsheet= new Spreadsheet();
		$this->sheet=$this->spreadsheet->getActiveSheet();
	}
	
	public function setCellValue($coloumn,$row,$value)
	{
			$this->sheet->setCellValueByColumnAndRow($coloumn,$row,$value);
	}
	public function save()
	{
		$writer = new Xlsx($this->spreadsheet);
		$writer->save("../upload/".$this->filename.'.xlsx');

	}
}
?>